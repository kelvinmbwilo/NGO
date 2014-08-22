<div class="navbar-inner">
<div class="navbar-container">
<!-- Navbar Barnd -->
<div class="navbar-header pull-left">
    <a href="index.html#" class="navbar-brand">
        <small>
            <img src="{{ asset('assets/img/logo.png') }} " alt="" />
        </small>
    </a>
</div>
<!-- /Navbar Barnd -->
<!-- Account Area and Settings --->
<div class="navbar-header pull-right">
<div class="navbar-account">
<ul class="account-area">

<li>
    <a class="login-area dropdown-toggle" data-toggle="dropdown">
        <div class="avatar" title="View your public profile">
            <i class="fa fa-user fa-2x"></i>
        </div>
        <section>
            <h2><span class="profile"><span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></span></h2>
        </section>
    </a>
    <!--Login Area Dropdown-->
    <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
        <li class="username"><a>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a></li>
        <li class="email"><a>{{ Auth::user()->email }}</a></li>
        <!--Avatar Area-->

        <!--Avatar Area-->
        <li class="edit">
            <a href="#" class="pull-left">Profile</a>
            <a href="#" class="pull-right">settings</a>
        </li>

        <li class="dropdown-footer">
            <a href="{{ url('logout') }}">
                Sign out
            </a>
        </li>
    </ul>
    <!--/Login Area Dropdown-->
</li>
<!-- /Account Area -->
<!--Note: notice that setting div must start right after account area list.
no space must be between these elements-->
<!-- Settings -->
<!-- Settings -->
</div>
</div>
<!-- /Account Area and Settings -->
</div>
</div>