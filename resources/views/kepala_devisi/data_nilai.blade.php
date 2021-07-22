@extends('layouts.app')
@section('title')
<title>Data Penilaian Pegawai</title>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Penilaian Pegawai</h3>
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
                            <th>Penilai</th>
                            <th>Bobot Nilai</th>
                            <th>Tanggal</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai_mar as $pmar)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pmar->nama}}</td>
                            <td>{{$pmar->devisi}}</td>
                            <td>{{$pmar->penilai}}</td>
                            <td>{{$pmar->bobot_nilai}}</td>
                            <td>{{$pmar->tanggal}}</td>
                            <td>
                                @if ($pmar->status != true)
                                    <a href="" class="btn btn-sm btn-warning">belum di konfirmasi</a>
                                @else
                                    <a href="" class="btn btn-sm btn-success">sudah di konfirmasi</a>
                                @endif
                                {{-- <a href="{{route('kepala.show.marketing',$marketing->id_pegawai)}}"
                                class="btn btn-info btn-sm"><i class="fas fa-file-alt"></i> Data cuti</a> --}}
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
