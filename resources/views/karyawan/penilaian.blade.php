@extends('layouts.app')
@section('title')
    <title>Penialai pegawai</title>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#timeline"
                                            data-toggle="tab">Penilaian</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- /.tab-pane -->
                                    <div class="active tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            @foreach ($nilai as $n)
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                    {{Carbon\Carbon::parse($n->tanggal)->translatedFormat('d F Y')}} <br>
                                                    {{Carbon\Carbon::parse($n->tanggal)->diffForHumans()}}
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> {{$n->created_at->format('h:i')}}</span>

                                                    <h3 class="timeline-header"><a href="#">{{$n->penilai}} as Kepala devisi {{$n->devisi}}</a> mengirimkan hasil penilaian</h3>

                                                    <div class="timeline-body">
                                                        Penilaian kerja anda pada tanggal <b>{{Carbon\Carbon::parse($n->tanggal)->translatedFormat('d F Y')}}</b> sudah di lakukan, dari seluruh penilaian anda mendapat nilai <strong>{{$n->bobot_nilai}}</strong> tekan tombol di bawah jika anda menyetujui penilaian ini
                                                    </div>
                                                    <div class="timeline-footer">
                                                        @if ($n->status != true)
                                                            <a href="{{route('pegawai.detail',$n->created_at)}}" class="btn btn-warning btn-sm">Detail</a>
                                                        @else
                                                            <button disabled class="btn btn-sm btn-success">sudah di setujui</button>
                                                            <a href="{{route('pegawai.cetak_hasil',$n->created_at)}}" class="btn btn-sm btn-secondary">Cetak Hasil</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
