@extends('layouts.app')
@section('css')
    <style>
        hr{
            border: 1px black solid;
            border-radius: 5PX;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-8">
        <h5><b>Sistem Informasi Kepegawaian</b> | <span>PT.Suwanda Karya Mandiri</span></h5>
    </div>
    <div class="col-4 text-right">
        <h5 id="clock" style="font-weight: bold"></h5>
    </div>
</div>
<hr>
<div class="row">
    @role("HRD")
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-restroom"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pegawai</span>
            <span class="info-box-number">{{$pegawai}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    @elserole("kepala devisi marketing")
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-restroom"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pegawai</span>
            <span class="info-box-number">{{$pegawai_marketing}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    @endrole
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-bullhorn"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Permintaan Cuti</span>
            <span class="info-box-number">{{$permintaan}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-archive"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending</span>
            <span class="info-box-number">{{$pending}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Approval</span>
            <span class="info-box-number">{{$approval}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
</div>

@endsection
@push('js')
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            hours = today.getHours() % 12;
            hours = hours ? hours : 12;
            m = checkTime(m);
            var ampm = today.getHours( ) >= 12 ? ' PM' : ' AM';
            document.getElementById('clock').innerHTML =  hours + ":" + m  + ampm;
            setTimeout(startTime, 1000);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
@endpush
