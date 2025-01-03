@extends('layouts.app')
@section('title')
    <title>All data pegawai administrasi</title>
@endsection
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-restroom"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pegawai Yang Harus Di Nilai</span>
            <span class="info-box-number">{{$data_penilaian}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pegawai</h3>
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
                            <th>Nama</th>
                            <th>Devisi</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Agama</th>
                            <th>jenis Kelamin</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>TTL</th>
                            <th>Tanggungan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Pendidikan Ditempuh</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_marketing as $marketing_data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>@if ($marketing_data->status_penilaian == false)
                                    <span style="color: red">{{$marketing_data->nama_depan}} {{$marketing_data->nama_belakang}}</span>
                                @else
                                    {{$marketing_data->nama_depan}} {{$marketing_data->nama_belakang}}
                                @endif</td>
                                <td>{{$marketing_data->devisi}}</td>
                                <td>{{$marketing_data->jabatan}}</td>
                                <td>{{$marketing_data->status}}</td>
                                <td>{{$marketing_data->agama}}</td>
                                <td>{{$marketing_data->jenis_kelamin}}</td>
                                <td>{{$marketing_data->email}}</td>
                                <td>{{$marketing_data->telepon}}</td>
                                <td>{{$marketing_data->alamat}}</td>
                                <td>{{$marketing_data->tempat_lahir}}, {{ \Carbon\Carbon::parse($marketing_data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                <td>{{$marketing_data->tanggungan}}</td>
                                <td>{{$marketing_data->pend_terakhir}}</td>
                                @if (!empty($marketing_data->pend_ditempuh))
                                <td>{{$marketing_data->pend_ditempuh}}</td>
                                @else
                                <td><p style="color: red">tidak sedang menempuh pendidikan</p></td>
                                @endif
                                <td>
                                    <a href="{{route('penilaian.pegawai',$marketing_data->id_pegawai)}}" class="btn btn-sm btn-info"> Penilaian</a>
                                    {{-- <a href="{{route('penilaian.pegawai.marketing',$marketing_data->id_pegawai)}}" class="btn btn-sm btn-info"> Penilaian</a> --}}
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
