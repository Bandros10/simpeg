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
