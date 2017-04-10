<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Dashboard .: Teknohealth :.</title>
      <link rel="icon" href="/assets/images/logo/logo-sm.png">

    <!-- CSS -->
    <link rel="stylesheet" href="views/dashboard/dashboard.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
  <div class="module-left-aside-icon" >
      <div class="ui vertical icon menu">
          <a class="item" href="#">
              <i class="home icon"></i>
          </a>
          <a class="item" href="#">
              <i class="configure icon"></i>
          </a>
          <a class="item" href="#">
              <i class="file icon"></i>
          </a>
          <a class="item" href="#">
              <i class="bookmark icon"></i>
          </a>
          <a class="item" href="#">
              <i class="unlock alternate icon"></i>
          </a>
      </div>
  </div>
  <div class="module-left-aside">
        <div class="module-left-title">
            <div class="ui icon input">
                <input type="text" placeholder="Search mail...">
                <i class="search icon"></i>
            </div>
        </div>
        <div class="module-left-container">
            <div class="module-left-nav clearfix">
                <div class="module-left-sidebar sidebar">
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="module-left-menu">
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/farmasi-101.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Farmasi</span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/manajemen-user.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Manajemen User </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/pendaftaran-pasien.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Pendaftaran Pasien </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/rawat-jalan.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Rawat Jalan </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/rawat-inap.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Rawat Inap </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/rekam-medik.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Rekam Medis </span>
                                </a>
                            </li>  <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/kepegawaian.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Kepegawaian </span>
                                </a>
                            </li>  <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/lab.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Laboratorium </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/master-data.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Master Data</span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/keuangan.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Keuangan </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#">
                                    <span> <img src="assets/images/logo/inventori.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">Inventori</span>
                                </a>
                            </li>

                            <li class="sidebar-nav-heading">Point of Sales</li>
                            <li>
                                <a href="#">
                                    <span><img src="assets/images/logo/pos-framasi.png" style="width: 25px"></span>
                                    <span class="sidebar-nav-item">POS Farmasi</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

  <div class="module-content-container">
      <div class="container" style="text-align: justify">
          <div class="center">
          <img alt="image" class="img-circle" src="assets/images/logo/picture.png" style="height: 250px">
              <h1> Klinik Alhamdulilah </h1><p>jl bandung </p>
              <button type="button" href=""  class="btn btn-default">Ubah Profile</button>
          </div>
      </div>
  </div>


	<!-- Main Javascript -->
    <script src="{{asset('/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Plugins -->
    <script src="{{asset('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/semantic/semantic.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset ('/assets/plugins/datatables/js/dataTables.semanticui.min.js')}}"></script>
    <script src="{{asset ('/assets/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset ('/assets/plugins/datatables/js/responsive.semanticui.min.js')}}"></script>

    <script src="views/dashboard/dashboard.js"></script>
  </body>
</html>