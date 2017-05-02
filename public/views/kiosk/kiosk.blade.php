    @extends('index')
@section('title')
    <title>SIM Klinik | Kiosk </title>
@endsection
@section('css')
    <style type="text/css">
        .no-btn-style {
            background: none;
            border: none;
            cursor: pointer;
        }
    </style>
@endsection
@section('view')
<div class="text-center" ng-controller="KioskCtrl">
    <h1 style="margin-top: 100px">KIOSK </h1>
    <h3>Terima kasih telah menggunakan fasilitas kiosk untuk melakukan pendaftaran .</h3>
    <div class="panel-body">
        <button class="btn btn-print no-btn-style" 
            type="button" 
            ng-click="postKioskCreate('bpjs')">
            <img src="{{asset('assets/images/button/icon-bpjs.png')}}" style="height: 200px">
        </button>
        <button class="btn btn-print no-btn-style" 
            type="button" 
            ng-click="postKioskCreate('umum')">
            <img src="{{asset('assets/images/button/icon-umum.png')}}" style="height: 200px">
        </button>
        <button class="btn btn-print no-btn-style" 
            type="button" 
            ng-click="postKioskCreate('contractor')">
            <img src="{{asset('assets/images/button/icon-asuransi.png')}}" style="height: 200px">
        </button>
    </div>
    <h1></h1>
    <h3>Struk antrian akan dicetak secara otomatis</h3>
</div>

<script type="text/ng-template" id="modalResponse">
    <div id="printArea">
        <div class="modal-header">
            <img src="{{asset('assets/images/logo/logo-md.png')}}" style="margin-top: 5px; margin-bottom: 5px" class="image">
            <h4 class="modal-title">Daftar Antrian</h4>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <h3>Antrian <b style="text-transform: uppercase;">[[result.type]]</b></h3>
                <h1>[[result.queue_number]]</h1>
            </div>
        </div>
        <div class="modal-footer">
           <span>[[currentDate]]</span>
           <h4 class="modal-title">Melayani Dengan Hati </h4>
        </div>
    </div>
</script>
@endsection
@section('scripts')
<script src="views/kiosk/kiosk.js"></script>
@endsection
