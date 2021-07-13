@extends('layouts.app')
@section('title')
<title>Penilaian</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <form action="#" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="nama_depan">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama"
                                value="{{$penilaian->nama_depan}} {{$penilaian->nama_belakang}}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="nama">Devisi</label>
                            <input type="text" class="form-control" name="devisi" value="{{$penilaian->devisi}}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{$penilaian->jabatan}}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir"
                                required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jabatan">Penilai</label>
                            <input type="text" class="form-control" name="jabatan" value="{{auth()->user()->name}}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        @foreach ($ev as $item)
                        <div class="form-group">
                            <label>{{$item->keterangan}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-2">
                        @foreach ($ev as $item)
                        <div class="form-group">
                            <input type="checkbox" name="bobot[]" value="{{$item->bobot}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Bobot nilai</label>
                            <input type="text" class="form-control" name="bobot_nilai" placeholder="Masukan Nilai" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="alamat">Keterangan</label>
                        <textarea class="form-control" name="keterangan" required></textarea>
                    </div>
                </div>
                <button type="submit" onclick="return confirm('apa data sudah benar')"
                    class="btn btn-primary btn-block">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</div>
@endsection
