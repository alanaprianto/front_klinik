@extends('index')
@section('css')
    <link href="views/login/login.css" rel="stylesheet">
@endsection
@section('view')
    <div ng-controller="LoginCtrl">
        <div class="ui middle aligned center aligned grid" style="width: 100%">
            <div class="column">
                <div class="ui stacked segment">
                    <img src="assets/images/logo/logo.png" style="margin-top: 0.4px" class="image">
                    <h2 class="ui teal header">
                        <div class="content">
                            LOGIN
                        </div>
                    </h2>
                    <div>
                        <div class="ui large form">
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" name="username" placeholder="User Name" ng-model="username">
                                    <!-- <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
                                    <span ng-show="myForm.username.$error.required">Username is required.</span>
                                    </span> -->
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" placeholder="Password" ng-model="password" 
                                        ng-keyup="$event.keyCode == 13 && doLogin()">
                                    <!-- <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
                                    <span ng-show="myForm.password.$error.required">Password is required.</span>
                                    </span> -->
                                </div>
                            </div>
                            <span ng-show="message && isLogin">
                                <span>[[message]]</span>
                            </span>
                            <div class="ui fluid large teal submit button" ng-click="doLogin()">Login</div>
                        </div>
                    </div>
                    <div class="field">
                        <hr>
                        <p>Tidak memiliki akun? <br>Klik tombol berikut untuk mengajukan pendaftaran.</p>
                    </div>
                    <div>
                        <a class="ui fluid large teal button" style="background-color: #FE6860" href="registasi">Registasi</a>
                        <a  href="kiosk" > KIOSK </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Trigger the modal with a button -->
            <a type="button" id="btn-modal" style="margin-left: 10px;cursor:pointer" >
                <img src="assets/images/button/monitor.png"  class="image">
            </a>

            <div class="ui basic modal">
                <div class="ui image header">
                    <img src="assets/images/logo/logo-md.png" class="image" style="width: inherit;">
                </div>
                <div class="content">
                    <h1>Kiosk & TV Display</h1>
                    <p>Display Antrian BPJS</p>
                    <p>Display Antrian Pasien Umum</p>
                    <p>Display Antrian Poli</p>
                    <p>Display Antrian Laboratorium</p>
                    <p>Display Antrian Pemeriksaan Laboratorium</p>
                    <p>Display Antrian Hasil Laboratorium</p>
                </div>
                <div class="actions">
                    <div class="ui red basic cancel inverted button btn-login-close">
                        <i class="remove icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="views/login/login.js"></script>
    <script src="assets/plugins/semantic/semantic.min.js"></script>
@endsection