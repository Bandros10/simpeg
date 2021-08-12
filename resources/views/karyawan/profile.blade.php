@extends('layouts.app')
@section('title')
<title>Profile Karyawan</title>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('dist/img/default-user.png')}}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$get_pegawai->nama_depan}} {{$get_pegawai->nama_belakang}}
                                </h3>

                                <p class="text-muted text-center">{{$get_pegawai->jabatan}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Jumlah Cuti</b> <a class="float-right">{{$cuti}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Jumlah Tanggungan</b> <a class="float-right">{{$get_pegawai->tanggungan}}</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Ubah/Upload Foto</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Biodata</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Pendidikan Terakhir</strong>

                                @if (!empty($get_pegawai->pend_ditempuh))
                                <p class="text-muted">
                                    {{$get_pegawai->pend_terakhir}} saat ini menempuh {{$get_pegawai->pend_ditempuh}}
                                </p>
                                @else
                                <p class="text-muted">
                                    {{$get_pegawai->pend_terakhir}}
                                </p>
                                @endif

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                <p class="text-muted">{{$get_pegawai->alamat}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Detail</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">{{$get_pegawai->agama}} | </span>
                                    <span class="tag tag-success">{{$get_pegawai->tempat_lahir}},
                                        {{Carbon\Carbon::parse($get_pegawai->tanggal_lahir)->translatedFormat('d F Y')}} |
                                    </span>
                                    <span class="tag tag-info">{{$get_pegawai->status}}</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Email dan Telepon</strong>

                                <p class="text-muted">{{$get_pegawai->email}} | {{$get_pegawai->telepon}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    {{-- <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Activity</a></li> --}}
                                    {{-- <li class="nav-item"><a class="nav-link active" href="#timeline"
                                            data-toggle="tab">Timeline</a></li> --}}
                                    <li class="nav-item"><a class="nav-link active" href="#settings"
                                            data-toggle="tab">Edit</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                    <a href="#">Jonathan Burke Jr.</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                                <span class="username">
                                                    <a href="#">Sarah Ross</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" placeholder="Response">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                                <span class="username">
                                                    <a href="#">Adam Jones</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="../../dist/img/photo2.png"
                                                                alt="Photo">
                                                            <img class="img-fluid" src="../../dist/img/photo3.jpg"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg"
                                                                alt="Photo">
                                                            <img class="img-fluid" src="../../dist/img/photo1.png"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div> --}}
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


                                    <div class="active tab-pane" id="settings">
                                        <form action="{{route('pegawai.update',$get_pegawai->id_pegawai)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="nama_depan" class="form-control"
                                                        value="{{$get_pegawai->nama_depan}}">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="nama_belakang" class="form-control"
                                                        value="{{$get_pegawai->nama_belakang}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email & Telepon:</label>
                                                <div class="col-sm-5">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{$get_pegawai->email}}">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" name="telepon" class="form-control"
                                                        value="{{$get_pegawai->telepon}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">NIK:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="nik" class="form-control"
                                                        value="{{$get_pegawai->nik}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2"
                                                    class="col-sm-2 col-form-label">Tanggungan:</label>
                                                <div class="col-sm-1">
                                                    <input type="text" name="tanggungan" class="form-control"
                                                        value="{{$get_pegawai->tanggungan}}">
                                                </div>
                                                <label for="inputName2" class="col-sm-1 col-form-label">Devisi:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="devisi" class="form-control"
                                                        value="{{$get_pegawai->devisi}}">
                                                </div>
                                                <label for="inputName2" class="col-sm-1 col-form-label">Jabatan:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="jabatan" class="form-control"
                                                        value="{{$get_pegawai->jabatan}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status:</label>
                                                <div class="col-sm-2">
                                                    <select name="status" class="form-control">
                                                        <option value="Menikah" @if(old('status', $get_pegawai->status) ===
                                                            'Menikah') selected @endif>Menikah</option>
                                                        <option value="Belum Menikah" @if(old('status', $get_pegawai->status)
                                                            === 'Belum Menikah') selected @endif>Belum Menikah
                                                        </option>
                                                    </select>
                                                </div>
                                                <label class="col-sm-1 col-form-label">Agama:</label>
                                                <div class="col-sm-2">
                                                    <select name="agama" class="form-control">
                                                        <option value="Islam" @if(old('agama', $get_pegawai->agama) ===
                                                            'Islam') selected @endif>Islam</option>
                                                        <option value="kristen Protestan" @if(old('agama', $get_pegawai->agama)
                                                            === 'kristen Protestan') selected @endif>Kristen Protestan
                                                        </option>
                                                        <option value="kristen Katolik" @if(old('agama', $get_pegawai->agama)
                                                            === 'kristen Katolik') selected @endif>Kristen Katolik
                                                        </option>
                                                        <option value="Hindu" @if(old('agama', $get_pegawai->agama) ===
                                                            'Hindu') selected @endif>Hindu</option>
                                                        <option value="Budha" @if(old('agama', $get_pegawai->agama) ===
                                                            'Budha') selected @endif>Budha</option>
                                                        <option value="Konghuchu" @if(old('agama', $get_pegawai->agama) ===
                                                            'Konghuchu') selected @endif>Konghuchu</option>
                                                        <option value="Lainnya" @if(old('agama', $get_pegawai->agama) ===
                                                            'Lainnya') selected @endif>Lainnya</option>
                                                    </select>
                                                </div>
                                                <label class="col-sm-1 col-form-label">Gender:</label>
                                                <div class="col-sm-4">
                                                    <select name="jenis_kelamin" class="form-control">
                                                        <option value="laki-laki" @if(old('jenis_kelamin', $get_pegawai->
                                                            jenis_kelamin) === 'laki-laki') selected @endif>Laki-Laki
                                                        </option>
                                                        <option value="Perempuan" @if(old('jenis_kelamin', $get_pegawai->
                                                            jenis_kelamin) === 'Perempuan') selected @endif>Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat:</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control"
                                                        name="alamat"> {{$get_pegawai->alamat}}</textarea>
                                                    <sup style="color: red">*alamat harus sesuai dengan kartu tanda
                                                        penduduk</sup>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tempat tanggal lahir:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{$get_pegawai->tempat_lahir}}">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input
                                                        value="{{Carbon\Carbon::parse($get_pegawai->tanggal_lahir)->translatedFormat('d F Y')}}"
                                                        class="form-control" type="text" onfocus="(this.type='date')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pendidikan terakhir:</label>
                                                <div class="col-sm-5">
                                                    <select name="pend_terakhir" class="form-control">
                                                        <option value="SD" @if(old('pend_terakhir', $get_pegawai->
                                                            pend_terakhir) === 'SD') selected @endif>SD</option>
                                                        <option value="SMP SEDERAJAT" @if(old('pend_terakhir', $get_pegawai->
                                                            pend_terakhir) === 'SMP SEDERAJAT') selected @endif>SMP
                                                            SEDERAJAT</option>
                                                        <option value="SMA SEDERAJAT" @if(old('pend_terakhir', $get_pegawai->
                                                            pend_terakhir) === 'SMA SEDERAJAT') selected @endif>SMA
                                                            SEDERAJAT</option>
                                                        <option value="S1" @if(old('pend_terakhir', $get_pegawai->
                                                            pend_terakhir) === 'S1') selected @endif>S1</option>
                                                        <option value="S2" @if(old('pend_terakhir', $get_pegawai->
                                                            pend_terakhir) === 'S2') selected @endif>S2</option>
                                                        <option value="S3" @if(old('pend_terakhir', $get_pegawai->
                                                            pend_terakhir) === 'S3') selected @endif>S3</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    @if (!empty($get_pegawai->pend_ditempuh))
                                                    <input type="text" class="form-control" name="pend_ditempuh"
                                                        value="{{$get_pegawai->pend_ditempuh}}">
                                                    @else
                                                    <input type="text" class="form-control" name="pend_ditempuh"
                                                        placeholder="Tidak sedang menempuh pendidikan">
                                                    @endif
                                                    <sup style="color: red">*bila tidak sedang menempuh pendidikan
                                                        kosongkan</sup>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Update</button>
                                        </div>
                                    </div>
                                    </form>
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