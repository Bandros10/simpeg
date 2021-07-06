@extends('layouts.app')
@section('title')
<title>Aprov cuti karyawan</title>
@endsection
@section('content')
<div class="row">
    <div class="col">
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
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pegawai_kepala as $d)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$d->nama_depan}} {{$d->nama_belakang}}</td>
                            <td>{{$d->jabatan}}</td>
                            <td>{{$d->telepon}}</td>
                            <td>
                                <a href="{{route('kepala.show',$d->id_pegawai)}}"
                                    class="btn btn-info btn-sm"><i class="fas fa-file-alt"></i> Data cuti</a>
                            </td>
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
