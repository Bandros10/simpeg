@extends('layouts.app')
@section('title')
<title>penilaian pegawai</title>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DETAIL NILAI PEGAWAI</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($data_nilai as $nilai)
                        <div class="row">
                            <div class="col-9">
                                <textarea class="form-control" readonly>{{$nilai->instrumen}}</textarea>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" readonly value="{{$nilai->nilai}}">
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <form action="{{route('konfirmasi',$nilai->created_at)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-info">Konfirmasi</button>
                        </form>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
