<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login .: Teknohealth :.</title>
  <link rel="icon" href="/assets/images/logo/logo-sm.png">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/semantic/semantic.min.css" rel="stylesheet">
    <link href="views/login/login.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
  <div class="ui middle aligned center aligned grid">
  <div class="column">
    <form class="ui large form">
      <div class="ui stacked segment">
      <img src="assets/images/logo/logo.png" style="margin-top: 0.4px" class="image">
     <h2 class="ui teal header">
      <div class="content">
        LOGIN
      </div>
    </h2>
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
        <div class="ui fluid large teal submit button">Login</div>
        <div class="field">
          <hr>
          <p>Tidak memiliki akun? <p>Klik tombol berikut untuk mengajukan pendaftaran.</p>
          </div>
          <a class="ui fluid large teal button" style="background-color: #FE6860" href="registasi">Registasi</a>
      </div>

      <div class="ui error message"></div>
     <p style="text-align:center;color: #fff">Copyright Teknoland 2017        Teknohealth Software ver. 1.0.0</p>
    </form>

    </div>
</div>
<div class="container">
  <!-- Trigger the modal with a button -->
  <a type="button" id="btn-modal" style="margin-left: 10px;cursor:pointer" ><img src="assets/images/button/monitor.png"  class="image"></a>

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
 <!-- Modal -->

   <script src="views/login/login.js"></script>
    <script src="assets/plugins/semantic/semantic.min.js"></script>
  </body>
</html>
