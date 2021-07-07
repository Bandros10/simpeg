@extends('layouts.app')

@section('title')
<title>Data cuti</title>
@endsection

@section('content')
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        @foreach ($data_cuti as $aktiviti)
                        @if ($aktiviti->status != true)
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{asset('dist/img/user7-128x128.jpg')}}"
                                    alt="User Image">
                                <span class="username">
                                    <a href="#">{{$aktiviti->nama_pengaju}}</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">{{$aktiviti->created_at->translatedFormat(' d F Y')}} -
                                    {{$aktiviti->created_at->diffForHumans()}}</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                                Pengajuan Cuti Atas Nama <b>{{strtoupper($aktiviti->nama_pengaju)}}</b> Jabatan Sebagai
                                <b>{{strtoupper($aktiviti->jabatan_pengaju)}}</b>
                                Pengajuan Cuti Di Ajukan Pada Tanggal <b>{{substr($aktiviti->tgl_cuti,0,10)}}</b> Sampai
                                tanggal <b>{{substr($aktiviti->tgl_cuti,12,20)}}</b>
                                Karena Keperluan <b>{{strtoupper($aktiviti->keterangan)}}</b>
                            </p>
                        </div>
                        <form action="{{route('kepala.update',$aktiviti->id_cuti)}}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-warning">APPROVAL</button>
                            <a href="{{Route('kepala.tolak',$aktiviti->id_cuti)}}" class="btn btn-danger">TOLAK</a>
                        </form>
                        @endif
                        @endforeach
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    {{-- <div class="active tab-pane" id="timeline">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-danger">
                                        10 Feb. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent
                                            you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy
                                            zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab,
                                            movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                            kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user bg-info"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins
                                            ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                            accepted your friend request
                                        </h3>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                            ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented
                                            on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                comment</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-success">
                                        3 Jan. 2014
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days
                                            ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded
                                            new photos</h3>

                                        <div class="timeline-body">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div> --}}
                    <!-- /.tab-pane -->
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
