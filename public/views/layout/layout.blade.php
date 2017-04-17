<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    @yield('title')

    <!-- CSS -->
    <link rel="stylesheet" href="views/layout/layout.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link href="views/pos_farmasi/style.css" rel="stylesheet">
      @yield('css')
  </head>
  <body>
	<!-- <div class="loader" id="loader">
	  <div class="ui active dimmer">
		<div class="ui loader"></div>
	  </div>
	</div> -->

    <div class="module-left-aside">
      @yield('module-title')
        <div class="module-left-container">
            <div class="module-left-nav clearfix">
                <div class="module-left-sidebar sidebar">
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="module-left-menu">
                            <li class="sidebar-nav-heading">Navigasi</li>
                            <li class="active">
                                <a href="#">
                                    <span class="sidebar-nav-item-icon fa fa-home fa-fw"></span>
                                    <span class="sidebar-nav-item">Beranda</span>
                                </a>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="sidebar-nav-item-icon fa fa-inbox fa-fw"></span>
                                    <span class="sidebar-nav-item">Inventori</span>
                                </a>
                                <ul class="module-left-dropdown" aria-expanded="false">
                                    <li><a href="#">Database Obat & Alkes</a></li>
                                    <li><a href="#">Database Non Alkes</a></li>
                                    <li><a href="#">Database Vendor</a></li>
                                    <li><a href="#">Stok</a></li>
                                    <li><a href="#">Depo</a></li>
                                    <li><a href="#">Pengadaan</a></li>
                                    <li><a href="#">Laporan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="sidebar-nav-item-icon fa fa-building fa-fw"></span>
                                    <span class="sidebar-nav-item">Depo</span>
                                </a>
                                <ul class="module-left-dropdown" aria-expanded="false">
                                    <li><a href="#">Stok</a></li>
                                    <li><a href="#">Laporan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('pos_farmasi')}}">
                                    <span class="sidebar-nav-item-icon fa fa-desktop fa-fw"></span>
                                    <span class="sidebar-nav-item">POS</span>
                                </a>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="sidebar-nav-item-icon fa fa-cogs fa-fw"></span>
                                    <span class="sidebar-nav-item">Pengaturan</span>
                                </a>
                                <ul class="module-left-dropdown" aria-expanded="false">
                                    <li><a href="#">Jasa Racikan</a></li>
                                    <li><a href="#">Depo</a></li>
                                </ul>
                            </li>

                            <li class="sidebar-nav-heading">Lain-lain</li>
                            <li>
                                <a href="login">
                                    <span class="sidebar-nav-item-icon fa fa-sign-out fa-fw"></span>
                                    <span class="sidebar-nav-item">Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
      @yield('module-content-container')
    
            @yield('content')

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

    <script src="views/layout/layout.js"></script>
    @yield('scripts')
  </body>
</html>
