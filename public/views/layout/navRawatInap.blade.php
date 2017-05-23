<nav class="sidebar-nav">
    <ul class="metismenu" id="module-left-menu">
        <li class="sidebar-nav-heading">Navigasi</li>
        <li>
            <a href="dashboard">
                <span class="sidebar-nav-item-icon fa fa-home fa-fw"></span>
                <span class="sidebar-nav-item">Beranda</span>
             </a>
        </li>
        <li>
            <a  href="register_irna" >
                <span class="sidebar-nav-item-icon fa fa-address-book fa-fw"></span>
                <span class="sidebar-nav-item">Pendaftaran Rawat Inap</span>
            </a>
        </li> 
        <li>
            <a href="/transaksiRawatInap">
                <span class="sidebar-nav-item-icon fa fa-shopping-basket fa-fw"></span>
                <span class="sidebar-nav-item">Transaksi Rawat Inap</span>
            </a>
        </li> 
        <li>
            <a href="infoRawatInap" >
                <span class="sidebar-nav-item-icon fa fa-info-circle fa-fw"></span>
                <span class="sidebar-nav-item">Informasi Rawat Inap</span>
            </a>
            <ul class="nav nav-second-level" aria-expanded="true">
                <li class="@yield('active-organizer-setting')"><a href="{{ url('admin/organizer/setting_')}}">Setting</a></li>
                <li class="@yield('active-organizer-list')"><a href="{{ url('admin/organizer/list')}}">List</a></li>
            </ul>
        </li>                       
        <li class="sidebar-nav-heading">Lain-lain</li>
        <li>
            <a href="login">
                <span class="sidebar-nav-item-icon fa fa-sign-out fa-fw"></span>
                <span class="sidebar-nav-item">Logout</span>
            </a>
        </li>
    </ul>
</nav>
    