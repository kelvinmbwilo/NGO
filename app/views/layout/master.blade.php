<!DOCTYPE html>
@if(Auth::guest())
{{  Redirect::to("/")  }}
@else
<!--
NGO Data Management App
Version: 1.0.0
Author: kelvin mbwilo
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }} " type="image/x-icon">


    <!--Basic Styles-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="index.html" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/weather-icons.min.css') }} " rel="stylesheet" />

    <!--Fonts-->
    <link href="{{ asset('assets/css/googlecss.css') }}" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link href="{{ asset('jquery.multiselect.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('jquery.multiselect.filter.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/beyond.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/demo.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/typicons.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }} " rel="stylesheet" />
    <link id="skin-link" href="index.html" rel="stylesheet" type="text/css" />
    {{ HTML::style("jqueryui/css/cupertino/jquery-ui.css") }}
    <!--Basic Scripts-->
    <script src="{{ asset('assets/js/jquery-2.0.3.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }} "></script>

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="{{ asset('assets/js/skins.min.js') }} "></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
<!-- Loading Container -->
<!--div class="loading-container">
    <div class="loading-progress">
        <div class="rotator">
            <div class="rotator">
                <div class="rotator colored">
                    <div class="rotator">
                        <div class="rotator colored">
                            <div class="rotator colored"></div>
                            <div class="rotator"></div>
                        </div>
                        <div class="rotator colored"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
        <div class="rotator"></div>
    </div>
</div-->
<!--  /Loading Container -->
<!-- Navbar -->
<div class="navbar">


    <!-- Branding -->
@include('layout.top_bar')
</div>
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
<!-- Page Container -->
<div class="page-container">
<!-- Page Sidebar -->
<div class="page-sidebar" id="sidebar">
@include('layout.left')
</div>
<!-- /Page Sidebar -->
<!-- Page Content -->
<div class="page-content">
<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url('home') }}">Home</a>
        </li>
        @yield('breadcrumbs')
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            @yield('header')
        </h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="index.html#">
            <i class="fa fa-bars"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="{{ URL::current() }}">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
@yield('contents')
</div>
<!-- /Page Body -->
</div>
<!-- /Page Content -->
</div>
<!-- /Page Container -->
<!-- Main Container -->

</div>


<!--Beyond Scripts-->
<script src="{{ asset('assets/js/jquery.form.js') }} "></script>
<script src="{{ asset('assets/js/beyond.min.js') }} "></script>



<!--Page Related Scripts-->
<!--Sparkline Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/sparkline/jquery.sparkline.js') }} "></script>
<script src="{{ asset('assets/js/charts/sparkline/sparkline-init.js') }} "></script>

<!--Easy Pie Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/easypiechart/jquery.easypiechart.js') }} "></script>
<script src="{{ asset('assets/js/charts/easypiechart/easypiechart-init.js') }} "></script>
{{ HTML::script("jqueryui/js/jquery-ui-1.10.4.custom.min.js") }}
<!--Flot Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/flot/jquery.flot.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.resize.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.pie.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.tooltip.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.orderBars.js') }} "></script>
<script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/ZeroClipboard.js') }}"></script>
<script src="{{ asset('assets/js/datatable/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables-init.js') }}"></script>
<script src="{{ asset('jquery.multiselect.js') }}"></script>
<script src="{{ asset('jquery.multiselect.filter.js') }}"></script>
<script type="text/javascript" src="{{ asset('Highcharts/js/highcharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('Highcharts/js/modules/exporting.js') }}"></script>
<script type="text/javascript" src="{{ asset('Highcharts/js/themes/sand-signika.js') }}"></script>
</body>
<!--  /Body -->
</html>
@endif