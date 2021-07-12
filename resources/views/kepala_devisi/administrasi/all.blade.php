@extends('layouts.app')
@section('title')
    <title>All data pegawai administrasi</title>
@endsection
@section('content')
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
                        @foreach ($all_admin as $admin_data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$admin_data->nama_depan}} {{$admin_data->nama_belakang}}</td>
                                <td>{{$admin_data->devisi}}</td>
                                <td>{{$admin_data->jabatan}}</td>
                                <td>{{$admin_data->status}}</td>
                                <td>{{$admin_data->agama}}</td>
                                <td>{{$admin_data->jenis_kelamin}}</td>
                                <td>{{$admin_data->email}}</td>
                                <td>{{$admin_data->telepon}}</td>
                                <td>{{$admin_data->alamat}}</td>
                                <td>{{$admin_data->tempat_lahir}}, {{ \Carbon\Carbon::parse($admin_data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                <td>{{$admin_data->tanggungan}}</td>
                                <td>{{$admin_data->pend_terakhir}}</td>
                                @if (!empty($admin_data->pend_ditempuh))
                                <td>{{$admin_data->pend_ditempuh}}</td>
                                @else
                                <td><p style="color: red">tidak sedang menempuh pendidikan</p></td>
                                @endif
                                <td>
                                    {{-- <form action="{{route('data_pegawai.destroy',$peg->id_pegawai)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                    </form> --}}
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
