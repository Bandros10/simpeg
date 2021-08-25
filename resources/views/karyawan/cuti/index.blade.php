@extends('layouts.app')

@section('title')
<title>Pengajuan Cuti</title>
@endsection

@section('content')
<div class="row">
    <div class="col-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Pengajuan Cuti</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('cuti.store')}}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="id_pegawai" hidden value="{{$data_pegawai->id_pegawai}}">
                <input type="text" name="jumlah_cuti" hidden value="{{1}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Nama Pengaju</label>
                                <input type="text" name="nama_pengaju" class="form-control"
                                    value="{{$data_pegawai->nama_depan}} {{$data_pegawai->nama_belakang}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jabatan Pengaju</label>
                                <input type="text" name="jabatan_pengaju" class="form-control" value="{{$data_pegawai->jabatan}}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Devisi</label>
                                <input type="text" name="devisi" class="form-control" value="{{$data_pegawai->devisi}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nomer Telepon Pengaju</label>
                        <input type="text" name="telepon" class="form-control" value="{{$data_pegawai->telepon}}" readonly>
                    </div>
                    <!-- Date range -->
                    <div class="form-group">
                        <label>Date range:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" id="date_range" name="tgl_cuti" class="form-control float-right">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Keteranan</label>
                        <textarea name="keterangan" class="form-control" placeholder="keterangan cuti"></textarea>
                    </div>
                    <!-- /.form group -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengajuan Cuti</h3>
            </div>
            @php
                $no = 1;
            @endphp
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengaju</th>
                            <th>Jabatan Pengaju</th>
                            <th>Telepon</th>
                            <th>Tanggal Cuti</th>
                            <th>Tanggal masuk</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pegawai_cuti as $cuti)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$cuti->nama_pengaju}}</td>
                                <td>{{$cuti->jabatan_pengaju}}</td>
                                <td>{{$cuti->telepon}}</td>
                                <td>{{Carbon\Carbon::parse($cuti->tgl_awal)->translatedFormat('d F Y')}}</td>
                                <td>{{Carbon\Carbon::parse($cuti->tgl_akhir)->translatedFormat('d F Y')}}</td>
                                <td>{{$cuti->keterangan}} <span></span> </td>
                                @if ($cuti->status == false)
                                    <td><p style="color: red">pengajuan cuti anda belum di aprov</p></td>
                                @elseif($cuti->status == 3)
                                    <td><p style="color: red">pengajuan cuti anda di tolak</p></td>
                                @else
                                    <td><p style="color: green">cuti sudah di aprov</p></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
         $('input[name="tgl_cuti"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            var star = start.format('YYYY-MM-DD');
            var end = end.format('YYYY-MM-DD');
            var diff = start.diff(end, 'days');
            if (diff <= -12) {
                alert('anda tidak bisa mengajukan lebih dari 12 hari sekaligus')
                location.reload();
            }
            console.log(diff);
        });
        // $('input[name="tgl_cuti"]').daterangepicker({
        //     autoUpdateInput: false,
        //     locale: {
        //         cancelLabel: 'Clear'
        //     }
        // });
        // $('input[name="tgl_cuti"]').on('apply.daterangepicker', function(ev, picker) {
        //     $(this).val(picker.startDate.format('MM/DD/YYYY') + '-' + picker.endDate.format('MM/DD/YYYY'));
        // });

        // $('input[name="tgl_cuti"]').on('cancel.daterangepicker', function(ev, picker) {
        //     $(this).val('');
        // });

        // $( "#date_range" ).keydown(function() {
        //     alert( "Handler for .keyup() called." );
        // });

        // var date = $('#date_range').find('input[type="text"]');
        //     inputs.keyup(function() {
        //     console.log($(this));
        // });

        // $('#date_range').on('change', function() {
        //     console.log(this.value);
        //     alert( this.value );
        // });

        // function myFunction() {
        //     var date = document.getElementById("date_range").value;
        //     var explode = date.split("-");
        //     console.log(explode);
        // }
    </script>
@endpush
