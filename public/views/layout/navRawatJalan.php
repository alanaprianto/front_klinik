<nav class="sidebar-nav">
    <ul class="metismenu" id="module-left-menu">
        <li class="sidebar-nav-heading">Navigasi</li>
        <li>
            <a href="dashboard">
                <span class="sidebar-nav-item-icon fa fa-home fa-fw"></span>
                <span class="sidebar-nav-item">Beranda</span>
             </a>
        </li>
        <li ng-repeat="l in listMenuPoli">
            <a href="[[l.name]]">
                <span class="sidebar-nav-item-icon fa fa-fw" ng-class="l.icon"></span>
                <span class="sidebar-nav-item">[[l.display_name]]</span>
            </a>
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
    