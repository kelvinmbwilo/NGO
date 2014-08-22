@extends('layout.master')

@section('breadcrumbs')

@stop

@section('header')

@stop

@section('contents')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left bg-themesecondary">
                        <div class="databox-piechart">
                            <div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)"><span class="white font-90">50%</span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themesecondary">14</span>
                        <div class="databox-text darkgray">NEW TASKS</div>
                        <div class="databox-stat themesecondary radius-bordered">
                            <i class="stat-icon icon-lg fa fa-tasks"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left bg-themethirdcolor">
                        <div class="databox-piechart">
                            <div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="15" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.2)"><span class="white font-90">15%</span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themethirdcolor">1</span>
                        <div class="databox-text darkgray">NEW MESSAGE</div>
                        <div class="databox-stat themethirdcolor radius-bordered">
                            <i class="stat-icon  icon-lg fa fa-envelope-o"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left bg-themeprimary">
                        <div class="databox-piechart">
                            <div id="users-pie" data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)"><span class="white font-90">76%</span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themeprimary">98</span>
                        <div class="databox-text darkgray">NEW USERS</div>
                        <div class="databox-state bg-themeprimary">
                            <i class="fa fa-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left no-padding bordered-left-2 bordered-palegreen">
                        <img src="{{ asset('assets/img/avatars/John-Smith.jpg') }} " style="width:65px; height:65px;">
                    </div>
                    <div class="databox-right padding-top-20">
                        <div class="databox-stat palegreen">
                            <i class="stat-icon icon-xlg fa fa-phone"></i>
                        </div>
                        <div class="databox-text darkgray">JOHN SMITH</div>
                        <div class="databox-text darkgray">TOP RESELLER</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="row">
<div class="col-xs-12">
<div class="dashboard-box">
<div class="box-header">
    <div class="deadline">
        Remaining Days: 109
    </div>
</div>
<div class="box-progress">
    <div class="progress-handle">day 20</div>
    <div class="progress progress-xs progress-no-radius bg-whitesmoke">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
        </div>
    </div>
</div>
<div class="box-tabbs">
    <div class="tabbable">
        <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
            <li class="active">
                <a data-toggle="tab" href="index.html#visits">
                    Visits
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="index.html#realtime">
                    Real-Time
                </a>
            </li>
            <li>
                <a data-toggle="tab" id="contacttab" href="index.html#bandwidth">
                    Bandwidth
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="index.html#sales">
                    Sales
                </a>
            </li>
        </ul>
        <div class="tab-content tabs-flat no-padding">
            <div id="visits" class="tab-pane active animated fadeInUp">
                <div class="row">
                    <div class="col-lg-12 chart-container">
                        <div id="dashboard-chart-visits" class="chart chart-lg"></div>
                    </div>
                </div>

            </div>
            <div id="realtime" class="tab-pane padding-left-5 padding-right-10 animated fadeInUp">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="dashboard-chart-realtime" class="chart chart-lg" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div id="bandwidth" class="tab-pane padding-10 animated fadeInUp">
                <div class="databox-sparkline bg-themeprimary">
                                                            <span id="dashboard-bandwidth-chart" data-sparkline="compositeline" data-height="250px" data-width="100%" data-linecolor="#fff" data-secondlinecolor="#eee"
                                                                  data-fillcolor="rgba(255,255,255,.1)" data-secondfillcolor="rgba(255,255,255,.25)"
                                                                  data-spotradius="0"
                                                                  data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55"
                                                                  data-highlightspotcolor="#fff" data-highlightlinecolor="#fff"
                                                                  data-linewidth="2" data-secondlinewidth="2"
                                                                  data-composite="500, 400, 100, 450, 300, 200, 100, 200">
                                                                300,300,400,300,200,300,300,200
                                                            </span>
                </div>
            </div>
            <div id="sales" class="tab-pane animated fadeInUp no-padding-bottom" style="padding:20px 20px 0 20px;">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="databox databox-xlg databox-vertical databox-inverted databox-shadowed">
                            <div class="databox-top">
                                <div class="databox-sparkline">
                                                                            <span data-sparkline="line" data-height="125px" data-width="100%" data-fillcolor="false" data-linecolor="themesecondary"
                                                                                  data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55"
                                                                                  data-highlightspotcolor="#ffce55" data-highlightlinecolor="#ffce55"
                                                                                  data-linewidth="1.5" data-spotradius="2">
                                                                                1,2,4,3,5,6,8,7,11,14,11,12
                                                                            </span>
                                </div>
                            </div>
                            <div class="databox-bottom no-padding text-align-center">
                                <span class="databox-number lightcarbon no-margin">224</span>
                                <span class="databox-text lightcarbon no-margin">Sale Unit / Hour</span>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="databox databox-xlg databox-vertical databox-inverted databox-shadowed">
                            <div class="databox-top">
                                <div class="databox-sparkline">
                                                                            <span data-sparkline="line" data-height="125px" data-width="100%" data-fillcolor="false" data-linecolor="themefourthcolor"
                                                                                  data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#8cc474"
                                                                                  data-highlightspotcolor="#8cc474" data-highlightlinecolor="#8cc474"
                                                                                  data-linewidth="1.5" data-spotradius="2">
                                                                                100,208,450,298,450,776,234,680,1100,1400,1000,1200
                                                                            </span>
                                </div>
                            </div>
                            <div class="databox-bottom no-padding text-align-center">
                                <span class="databox-number lightcarbon no-margin">7063$</span>
                                <span class="databox-text lightcarbon no-margin">Income / Hour</span>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="databox databox-xlg databox-vertical databox-inverted databox-shadowed">
                            <div class="databox-top">
                                <div class="databox-piechart">
                                    <div data-toggle="easypiechart" class="easyPieChart block-center"
                                         data-barcolor="themeprimary" data-linecap="butt" data-percent="80" data-animate="500"
                                         data-linewidth="8" data-size="125" data-trackcolor="#eee">
                                        <span class="font-200"><i class="fa fa-gift themeprimary"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="databox-bottom no-padding text-align-center">
                                <span class="databox-number lightcarbon no-margin">9</span>
                                <span class="databox-text lightcarbon no-margin">NEW ORDERS</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="databox databox-xlg databox-vertical databox-inverted  databox-shadowed">
                            <div class="databox-top">
                                <div class="databox-piechart">
                                    <div data-toggle="easypiechart" class="easyPieChart block-center"
                                         data-barcolor="themethirdcolor" data-linecap="butt" data-percent="40" data-animate="500"
                                         data-linewidth="8" data-size="125" data-trackcolor="#eee">
                                        <span class="white font-200"><i class="fa fa-tags themethirdcolor"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="databox-bottom no-padding text-align-center">
                                <span class="databox-number lightcarbon no-margin">11</span>
                                <span class="databox-text lightcarbon no-margin">NEW TICKETS</span>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-visits">
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="databox no-margin">
                <div class="databox-left">
                    <div class="databox-sparkline">
                                                                <span data-sparkline="bar" data-height="40px" data-width="100%" data-barcolor="themeprimary" data-negbarcolor="#a0d468" data-zerocolor="#d73d32"
                                                                      data-barwidth="5px" data-barspacing="1px">
                                                                    5,6,7,2,1,4,2,4
                                                                </span>
                    </div>
                </div>
                <div class="databox-right">
                    <span class="databox-number themeprimary">10969</span>
                    <div class="databox-text darkgray">REFERRAL VISITS</div>
                    <div class="databox-state bg-palegreen">
                        <i class="fa fa-check"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="databox no-margin">
                <div class="databox-left">
                    <div class="databox-sparkline">
                                                                <span data-sparkline="line" data-height="45px" data-width="100%" data-fillcolor="false" data-linecolor="#ffce55"
                                                                      data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55"
                                                                      data-highlightspotcolor="#f5f5f5 " data-highlightlinecolor="#fb6e52"
                                                                      data-linewidth="1.2" data-spotradius="0">
                                                                    1,3,2,5,4,0,5,7,6,5
                                                                </span>
                    </div>
                </div>
                <div class="databox-right">
                    <span class="databox-number themeprimary">5720</span>
                    <div class="databox-text darkgray">SEARCH ENGINES</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="databox no-margin">
                <div class="databox-left padding-5">
                    <div class="databox-piechart">
                        <div data-toggle="easypiechart" class="easyPieChart block-center"
                             data-barcolor="themesecondary" data-linecap="butt" data-percent="80" data-animate="500"
                             data-linewidth="2" data-size="45" data-trackcolor="#f3f3f3">
                            <span class="databox-text darkgray">44%</span>
                        </div>
                    </div>
                </div>
                <div class="databox-right">
                    <span class="databox-number themeprimary">8806</span>
                    <div class="databox-text darkgray">DIRECT VISITS</div>
                    <div class="databox-state bg-palegreen">
                        <i class="fa fa-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="orders-container">
        <div class="orders-header">
            <h6>Latest Orders</h6>
        </div>
        <ul class="orders-list">
            <li class="order-item">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                        <div class="item-booker">Ned Stards</div>
                        <div class="item-time">
                            <i class="fa fa-calendar"></i>
                            <span>10 minutes ago</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                        <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">400</span>
                        </div>
                    </div>
                </div>
                <a class="item-more" href="index.html">
                    <i></i>
                </a>
            </li>
            <li class="order-item top">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                        <div class="item-booker">Steve Lewis</div>
                        <div class="item-time">
                            <i class="fa fa-calendar"></i>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                        <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">620</span>
                        </div>
                    </div>
                </div>
                <a class="item-more" href="index.html">
                    <i></i>
                </a>
            </li>
            <li class="order-item">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                        <div class="item-booker">John Ford</div>
                        <div class="item-time">
                            <i class="fa fa-calendar"></i>
                            <span>Today 8th July</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                        <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">220</span>
                        </div>
                    </div>
                </div>
                <a class="item-more" href="index.html">
                    <i></i>
                </a>
            </li>
            <li class="order-item">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                        <div class="item-booker">Kim Basinger</div>
                        <div class="item-time">
                            <i class="fa fa-calendar"></i>
                            <span>Yesterday 7th July</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                        <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">400</span>
                        </div>
                    </div>
                </div>
                <a class="item-more" href="index.html">
                    <i></i>
                </a>
            </li>
            <li class="order-item">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                        <div class="item-booker">Steve Lewis</div>
                        <div class="item-time">
                            <i class="fa fa-calendar"></i>
                            <span>5th July</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                        <div class="item-price">
                            <span class="currency">$</span>
                            <span class="price">340</span>
                        </div>
                    </div>
                </div>
                <a class="item-more" href="index.html">
                    <i></i>
                </a>
            </li>
        </ul>
        <div class="orders-footer">
            <a class="show-all" href="index.html"><i class="fa fa-angle-down"></i> Show All</a>
            <div class="help">
                <a href="index.html"><i class="fa fa-question"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
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


@stop