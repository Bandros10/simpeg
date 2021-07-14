@extends('layouts.app')
@section('title')
<title>Penilaian</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route('simpan.penilaian.pegawai')}}" method="POST">
            @csrf
            <input type="text" name="id_pegawai" value="{{$penilaian->id_pegawai}}" hidden>
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
                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jabatan">Penilai</label>
                            <input type="text" class="form-control" name="penilai" value="{{auth()->user()->name}}"
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
                            <input type="checkbox" class="skor" value="{{$item->bobot}}">
                        </div>
                        @endforeach
                        <input type="button" id="hitung" class="btn btn-sm bg-gradient-primary" value="hitung skor">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Bobot nilai</label>
                            <input type="text" class="form-control" id="bobot_nilai" name="bobot_nilai"
                                placeholder="Masukan Nilai" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="alamat">Keterangan</label>
                        <textarea class="form-control" name="keterangan" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" onclick="return confirm('apa data sudah benar')"
                            class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
    $('#hitung').click(function () {
        var sum = 0;
        var checkboxes = $('.skor:checked').map(function () {
            return this.value}).get();
        var res = checkboxes.map(function(v) {
            return parseInt(v, 10);
        });
        for (let i = 0; i < res.length; i++) {
            sum += res[i];
        }
        document.getElementById("bobot_nilai").value = sum;
    });
</script>
@endpush
