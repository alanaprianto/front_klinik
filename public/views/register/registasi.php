<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registasi .: Teknohealth :.</title>
  <link rel="icon" href="assets/images/logo/logo-sm.png">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/semantic/semantic.min.css" rel="stylesheet">
    <link href="views/register/registasi.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>
  <body>
  <div class="ui middle aligned center aligned grid">
  <div class="column">
    <form class="ui large form">
      <div class="ui stacked segment">
     <h2 class="ui teal header">
      <div class="content">
        Registasi
      </div>
    </h2>
    <p>Data registrasi akan diajukan untuk pembuatan akun baru</p>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="name" placeholder="Nama Lengkap">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="browser icon"></i>
            <input type="text" name="job" placeholder="Jabatan">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="user" placeholder="User Name">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>

        <a class="ui fluid large teal submit button" style="background-color: #FE6860" data-toggle="modal" data-target="#Regis">Registasi</a>
         <div class="field">
          <hr>
          <p>Login?<p>Klik tombol berikut untuk melakukan login. </p>
          </div>
      <a class="ui fluid large teal  button " href="login">Login</a>
      </div>

      <div class="ui error message"></div>

    </form>
    </div>
</div>
<div class="container">
  <!-- Trigger the modal with a button -->
  <a type="button" style="margin-left: 10px;cursor:pointer" id="btn-modal" ><img src="assets/images/button/monitor.png"  class="image"></a>

  <div class="ui basic modal">
          <div class="ui image header">
             <img src="assets/images/logo/logo-md.png"  class="image">
          </div>
          <div class="content">

            <h1> Kiosk & TV Display</h1>
            <p>Display Antrian BPJS</p>
            <p>Display Antrian Pasien Umum</p>
            <p>Display Antrian Poli</p>
            <p>Display Antrian Laboratorium</p>
            <p>Display Antrian Pemeriksaan Laboratorium</p>
            <p>Display Antrian Hasil Laboratorium</p>
          </div>
          <div class="actions">
            <div class="ui red basic cancel inverted button">
              <i class="remove icon"></i>
              </div>

        </div>

    </div>
  </div>

</div>

  <p style="text-align:center;color: #fff">Copyright Teknoland 2017        Teknohealth Software ver. 1.0.0</p>
 <script src="views/register/registasi.js"></script>
    <script src="assets/plugins/semantic/semantic.min.js"></script>
  </body>
</html>
