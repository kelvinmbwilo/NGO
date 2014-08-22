<!-- Page Sidebar Header-->
<div class="sidebar-header-wrapper">
    <input type="text" class="searchinput" />
    <i class="searchicon fa fa-search"></i>
    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
</div>
<!-- /Page Sidebar Header -->
<!-- Sidebar Menu -->
<ul class="nav sidebar-menu">
<!--Dashboard-->
<li class="active">
    <a href="{{ url('home') }}">
        <i class="menu-icon glyphicon glyphicon-home"></i>
        <span class="menu-text"> Dashboard </span>
    </a>
</li>
<!--Databoxes-->
<li>
    <a href="{{ url('ngos') }}">
        <i class="menu-icon glyphicon glyphicon-tasks"></i>
        <span class="menu-text"> NGO's Management </span>
    </a>
</li>
<!--Widgets-->
<li>
    <a href="{{ url('reports') }}">
        <i class="menu-icon fa fa-th"></i>
        <span class="menu-text"> Yearly Reports </span>
    </a>
</li>
<!--UI Elements-->
<li>
    <a href="index.html#" class="menu-dropdown">
        <i class="menu-icon fa fa-desktop"></i>
        <span class="menu-text"> Statistics </span>

        <b class="menu-expand"></b>
    </a>

    <ul class="submenu">
        <li>
            <a href="#">
                <span class="menu-text">Reports</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="menu-text">Annual Report Summary</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="menu-text">Financial Statement Summary</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="menu-text">Employment Summary</span>
            </a>
        </li>
    </ul>
</li>

<!--Profile-->
<li>
    <a href="{{ url('users') }}">
        <i class="menu-icon fa fa-picture-o"></i>
        <span class="menu-text">Users</span>
    </a>
</li>
<!--Mail-->

<!--Right to Left-->
<li style="display: none">
    <a href="index.html#" class="menu-dropdown">
        <i class="menu-icon fa fa-align-right"></i>
        <span class="menu-text"> Right to Left </span>

        <b class="menu-expand"></b>
    </a>
    <ul class="submenu">
        <li>
            <a>
                <span class="menu-text">RTL</span>
                <label class="pull-right margin-top-10">
                    <input id="rtl-changer" class="checkbox-slider slider-icon colored-primary" type="checkbox">
                    <span class="text"></span>
                </label>
            </a>
        </li>
        <li>
            <a href="index-rtl-ar.html">
                <span class="menu-text">Arabic Layout</span>
            </a>
        </li>

        <li>
            <a href="index-rtl-fa.html">
                <span class="menu-text">Persian Layout</span>
            </a>
        </li>
    </ul>
</li>
</ul>
<!-- /Sidebar Menu -->
<!-- Sidebar Collapse -->
<div class="sidebar-collapse" id="sidebar-collapse">
    <i class="collapse-icon"></i>
</div>
<!-- /Sidebar Collapse -->
