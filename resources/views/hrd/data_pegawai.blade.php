@extends('layouts.app')
@section('title')
<title>
    Data Pegawai
</title>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Masuk</th>
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
                        @foreach ($data_pegawai as $peg)
                            <tr>
                                <td>{{$no++}}</td>
                                <td> <a href="{{route('data_pegawai.edit',$peg->id_pegawai)}}">{{$peg->nama_depan}} {{$peg->nama_belakang}}</a></td>
                                <td>{{$peg->tanggal_masuk}}</td>
                                <td>{{$peg->jabatan}}</td>
                                <td>{{$peg->status}}</td>
                                <td>{{$peg->agama}}</td>
                                <td>{{$peg->jenis_kelamin}}</td>
                                <td>{{$peg->email}}</td>
                                <td>{{$peg->telepon}}</td>
                                <td>{{$peg->alamat}}</td>
                                <td>{{$peg->tempat_lahir}}, {{ \Carbon\Carbon::parse($peg->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                <td>{{$peg->tanggungan}}</td>
                                <td>{{$peg->pend_terakhir}}</td>
                                @if (!empty($peg->pend_ditempuh))
                                <td>{{$peg->pend_ditempuh}}</td>
                                @else
                                <td><p style="color: red">tidak sedang menempuh pendidikan</p></td>
                                @endif
                                <td>
                                    <form action="{{route('data_pegawai.destroy',$peg->id_pegawai)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                </form></td>
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
