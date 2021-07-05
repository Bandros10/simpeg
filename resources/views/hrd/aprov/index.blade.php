@extends('layouts.app')

@section('title')
    <title>Data Pengajuan Cuti</title>
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
                        @foreach ($data_pegawai as $data_cuti)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data_cuti->nama_depan}} {{$data_cuti->nama_belakang}}</td>
                                <td>{{$data_cuti->jabatan}}</td>
                                <td>{{$data_cuti->telepon}}</td>
                                <td>
                                    <a href="{{route('aproval.show',$data_cuti->id_pegawai)}}" class="btn btn-info btn-sm"><i class="fas fa-file-alt"></i> Data cuti</a>
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
