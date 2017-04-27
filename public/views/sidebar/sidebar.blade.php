<link rel="stylesheet" href="views/sidebar/sidebar.css">

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
        <a class="item" href="logout">
          <i class="fa fa-sign-out"></i>
        </a>
  </div>
</div>

<div class="module-left-aside">
    <div class="module-left-title">
        <div class="ui icon input">
            <input type="text" placeholder="Search">
            <i class="search icon"></i>
        </div>
    </div>
    <div class="module-left-container">
        <div class="module-left-nav clearfix">
            <div class="module-left-sidebar sidebar">
                <nav class="sidebar-nav">
                    <ul class="metismenu" id="module-left-menu">
                        <li class="item">
                            <a href="{{url('farmasi')}}">
                                <span> <img src="assets/images/logo/farmasi-101.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Farmasi</span>
                            </a>
                        </li>
                       <!--  <li class="item">
                            <a href="{{url('managementUser')}}">
                                <span> <img src="assets/images/logo/manajemen-user.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Manajemen User </span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{url('antrian')}}">
                                <span> <img src="assets/images/logo/antrian.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Antrian </span>
                            </a>
                        </li> -->
                          <li class="item">
                            <a href="{{url('loket')}}">
                                <span> <img src="assets/images/logo/dataPasien.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Loket </span>
                            </a>
                        </li>
                          <li class="item">
                            <a href="{{url('dataPasien')}}">
                                <span> <img src="assets/images/logo/pendaftaran-pasien.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Data Pasien </span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{url('rawatjalan')}}">
                                <span> <img src="assets/images/logo/rawat-jalan.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Penata Jasa </span>
                            </a>
                        </li>
                        <!-- <li class="item">
                            <a href="{{url('rawatinap')}}">
                                <span> <img src="assets/images/logo/rawat-inap.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Rawat Inap </span>
                            </a>
                        </li> -->
                        <li class="item">
                            <a href="{{url('kepegawaian')}}">
                                <span> <img src="assets/images/logo/kepegawaian.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Kepegawaian </span>
                            </a>
                        </li>
                        <!--  <li class="item">
                            <a href="{{url('rekammedis')}}">
                                <span> <img src="assets/images/logo/rekam-medik.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Rekam Medis </span>
                            </a>
                        </li>  
                        <li class="item">
                            <a href="{{url('leb')}}">
                                <span> <img src="assets/images/logo/lab.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Laboratorium </span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{url('masterdata')}}">
                                <span> <img src="assets/images/logo/master-data.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Master Data</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{url('keuangan')}}">
                                <span> <img src="assets/images/logo/keuangan.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Keuangan </span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{url('inventori')}}">
                                <span> <img src="assets/images/logo/inventori.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Inventori</span>
                            </a>
                        </li> -->

                        <li class="sidebar-nav-heading">Point of Sales</li>
                        <li>
                            <a href="{{url('kasir')}}">
                                <span><img src="assets/images/logo/pos-framasi.png" style="width: 25px"></span>
                                <span class="sidebar-nav-item">Kasir</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>