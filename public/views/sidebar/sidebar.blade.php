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
            <input type="text" placeholder="Search" ng-model="searchMenu">
            <i class="search icon"></i>
        </div>
    </div>
    <div class="module-left-container">
        <div class="module-left-nav clearfix">
            <div class="module-left-sidebar sidebar">
                <nav class="sidebar-nav">
                    <ul class="metismenu" id="module-left-menu">
                        <li class="item" ng-repeat="l in listMenu | filter: { text: searchMenu}">
                            <a href="[[l.link]]">
                                <span> <img ng-src="[[l.image]]" style="width: 25px"></span>
                                <span class="sidebar-nav-item">[[l.text]]</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>