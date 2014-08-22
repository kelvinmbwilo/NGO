<!DOCTYPE html>
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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="{{ asset('assets/css/beyond.min.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/demo.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/typicons.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }} " rel="stylesheet" />
    <link id="skin-link" href="index.html" rel="stylesheet" type="text/css" />
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
<div class="loading-container">
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
</div>
<!--  /Loading Container -->
<!-- Navbar -->
<div class="navbar">
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
<script src="{{ asset('assets/js/beyond.min.js') }} "></script>


<!--Page Related Scripts-->
<!--Sparkline Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/sparkline/jquery.sparkline.js') }} "></script>
<script src="{{ asset('assets/js/charts/sparkline/sparkline-init.js') }} "></script>

<!--Easy Pie Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/easypiechart/jquery.easypiechart.js') }} "></script>
<script src="{{ asset('assets/js/charts/easypiechart/easypiechart-init.js') }} "></script>

<!--Flot Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/flot/jquery.flot.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.resize.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.pie.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.tooltip.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.orderBars.js') }} "></script>

<script>
// If you want to draw your charts with Theme colors you must run initiating charts after that current skin is loaded
$(window).bind("load", function() {

    /*Sets Themed Colors Based on Themes*/
    themeprimary = getThemeColorFromCss('themeprimary');
    themesecondary = getThemeColorFromCss('themesecondary');
    themethirdcolor = getThemeColorFromCss('themethirdcolor');
    themefourthcolor = getThemeColorFromCss('themefourthcolor');
    themefifthcolor = getThemeColorFromCss('themefifthcolor');

    //Sets The Hidden Chart Width
    $('#dashboard-bandwidth-chart')
        .data('width', $('.box-tabbs')
            .width() - 20);

    //-------------------------Visitor Sources Pie Chart----------------------------------------//
    var data = [
        {
            data: [[1, 21]],
            color: '#fb6e52'
        },
        {
            data: [[1, 12]],
            color: '#e75b8d'
        },
        {
            data: [[1, 11]],
            color: '#a0d468'
        },
        {
            data: [[1, 10]],
            color: '#ffce55'
        },
        {
            data: [[1, 46]],
            color: '#5db2ff'
        }
    ];
    var placeholder = $("#dashboard-pie-chart-sources");
    placeholder.unbind();



    //------------------------------Visit Chart------------------------------------------------//
    var data2 = [{
        color: themesecondary,
        label: "Direct Visits",
        data: [[3, 2], [4, 5], [5, 4], [6, 11], [7, 12], [8, 11], [9, 8], [10, 14], [11, 12], [12, 16], [13, 9],
            [14, 10], [15, 14], [16, 15], [17, 9]],

        lines: {
            show: true,
            fill: true,
            lineWidth: .1,
            fillColor: {
                colors: [{
                    opacity: 0
                }, {
                    opacity: 0.4
                }]
            }
        },
        points: {
            show: false
        },
        shadowSize: 0
    },
        {
            color: themeprimary,
            label: "Referral Visits",
            data: [[3, 10], [4, 13], [5, 12], [6, 16], [7, 19], [8, 19], [9, 24], [10, 19], [11, 18], [12, 21], [13, 17],
                [14, 14], [15, 12], [16, 14], [17, 15]],
            bars: {
                order: 1,
                show: true,
                borderWidth: 0,
                barWidth: 0.4,
                lineWidth: .5,
                fillColor: {
                    colors: [{
                        opacity: 0.4
                    }, {
                        opacity: 1
                    }]
                }
            }
        },
        {
            color: themethirdcolor,
            label: "Search Engines",
            data: [[3, 14], [4, 11], [5, 10], [6, 9], [7, 5], [8, 8], [9, 5], [10, 6], [11, 4], [12, 7], [13, 4],
                [14, 3], [15, 4], [16, 6], [17, 4]],
            lines: {
                show: true,
                fill: false,
                fillColor: {
                    colors: [{
                        opacity: 0.3
                    }, {
                        opacity: 0
                    }]
                }
            },
            points: {
                show: true
            }
        }
    ];
    var options = {
        legend: {
            show: false
        },
        xaxis: {
            tickDecimals: 0,
            color: '#f3f3f3'
        },
        yaxis: {
            min: 0,
            color: '#f3f3f3',
            tickFormatter: function (val, axis) {
                return "";
            },
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 0,
            aboveData: false,
            color: '#fbfbfb'

        },
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false,
            content: " <b>%x May</b> , <b>%s</b> : <span>%y</span>",
        }
    };
    var placeholder = $("#dashboard-chart-visits");
    var plot = $.plot(placeholder, data2, options);

    //------------------------------Real-Time Chart-------------------------------------------//
    var data = [],
        totalPoints = 300;

    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        // Do a random walk

        while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]]);
        }

        return res;
    }
    // Set up the control widget
    var updateInterval = 1500;
    var plot = $.plot("#dashboard-chart-realtime", [getRandomData()], {
        yaxis: {
            color: '#f3f3f3',
            min: 0,
            max: 100,
            tickFormatter: function (val, axis) {
                return "";
            }
        },
        xaxis: {
            color: '#f3f3f3',
            min: 0,
            max: 100,
            tickFormatter: function (val, axis) {
                return "";
            }
        },
        colors: [themeprimary],
        series: {
            lines: {
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.5
                    }, {
                        opacity: 0
                    }]
                },
                steps: false
            },
            shadowSize: 0
        },
        grid: {
            hoverable: true,
            clickable: false,
            borderWidth: 0,
            aboveData: false
        }
    });

    function update() {

        plot.setData([getRandomData()]);

        plot.draw();
        setTimeout(update, updateInterval);
    }
    update();


    //-------------------------Initiates Easy Pie Chart instances in page--------------------//
    InitiateEasyPieChart.init();

    //-------------------------Initiates Sparkline Chart instances in page------------------//
    InitiateSparklineCharts.init();
});

</script>
<!--Google Analytics::Demo Only-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-52103994-1', 'beyondadmin.s3-website-us-west-2.amazonaws.com');
    ga('send', 'pageview');

</script>


</body>
<!--  /Body -->
</html>
