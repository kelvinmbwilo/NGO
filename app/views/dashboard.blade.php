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
                            <div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)"><span class="white font-90"></span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themesecondary">{{ count(NGOs::all()) }}</span>
                        <div class="databox-text darkgray">Registered NGOs</div>
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
                            <div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="15" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.2)"><span class="white font-90"></span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themethirdcolor col-xs-4" style="padding: 2px;font-size: 11px">All {{ count(NGOsMembers::all()) }}</span>
                        <span class="databox-number themethirdcolor  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-male"></i> {{ count(NGOsMembers::where('sex','Male')->get()) }}</span>
                        <span class="databox-number themethirdcolor  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-female"></i> {{ count(NGOsMembers::where('sex','Female')->get()) }}</span>
                        <div class="databox-text darkgray col-xs-11">NGOs Members</div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left bg-themeprimary">
                        <div class="databox-piechart">
                            <div id="users-pie" data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)"><span class="white font-90"></span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px">All {{ count(EmploymentParticulars::where('employement_status','Employee')->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-male"></i> {{ count(EmploymentParticulars::where('employement_status','Employee')->where('gender','Male')->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-female"></i> {{ count(EmploymentParticulars::where('employement_status','Employee')->where('gender','Female')->get()) }}</span>
                        <div class="databox-text darkgray  col-xs-11">EMPLOYEES</div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left bg-themesecondary">
                        <div class="databox-piechart">
                            <div id="users-pie" data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)"><span class="white font-90"></span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px">All {{ count(EmploymentParticulars::where('employement_status','Volunteer')->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-male"></i> {{ count(EmploymentParticulars::where('employement_status','Volunteer')->where('gender','Male')->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-female"></i> {{ count(EmploymentParticulars::where('employement_status','Volunteer')->where('gender','Female')->get()) }}</span>
                        <div class="databox-text darkgray col-xs-11">VOLUNTEER</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row">
<div class="col-xs-12">
<div class="dashboard-box">
<div class="box-header">

</div>
<div class="box-tabbs">
    <div class="tabbable">
        <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
            <li class="active">
                <a data-toggle="tab" href="#visits">

                </a>
            </li>

        </ul>
        <div class="tab-content tabs-flat no-padding">
            <div id="visits1" class="tab-pane active animated fadeInUp">
                <div class="row">
                    <div class="col-lg-12 chart-container">
                        <div id="dashboard-chart-visits" class="chart chart-lg" style="height: 500px"></div>
                    </div>
                </div>

            </div>
            <div id="visits" class="tab-pane active animated fadeInUp">
                <div class="row">
                    <div class="col-lg-12 chart-container">
                        <div id="dashboard-chart-visits" class="chart chart-lg" style="height: 500px"></div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div><div class="box-tabbs">
    <div class="tabbable">
        <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
            <li class="active">
                <a data-toggle="tab" href="index.html#visits">

                </a>
            </li>

        </ul>
        <div class="tab-content tabs-flat no-padding">
            <div id="visits22" class="tab-pane active animated fadeInUp">
                <div class="row">
                    <div class="col-lg-12 chart-container">
                        <div id="practices" class="chart chart-lg" style="height: 500px"></div>
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

</div>
<script>
    <?php
$sector = array(
                    "Agriculture and Food Security"=>"Agriculture and Food Security",
                    "Education and Training"=>"Education and Training",
                    "Health and HIV/AIDS"=>"Health and HIV/AIDS",
                    "Tourism and Wildlife"=>"Tourism and Wildlife",
                    "Social Security and Social Protection"=>"Social Security and Social Protection",
                    "Legal and Human Rights"=>"Legal and Human Rights",
                    "Good Governance"=>"Good Governance",
                    "Gender and Women Empowerment"=>"Gender and Women Empowerment",
                    "Water and Sanitation"=>"Water and Sanitation",
                    "Environment and Climate Change"=>"Environment and Climate Change",
                    "Labor and Employment"=>"Labor and Employment",
                    "Finance"=>"Finance",
                    " Mineral and Energy "=>"Mineral and Energy ",
                    "Sports and Culture"=>"Sports and Culture",
                    "Transport and Infrastructure"=>"Transport and Infrastructure",
                );
                $i =0;
                $category = "";
                $column = "";
                $pie = "";
                foreach($sector as $value){
                $i++;
                 $category .= (count($sector) == $i)?"'$value'":"'$value',";
                 $column .= (count($sector) == $i)?count(NGOs::where('priority_sector',$value)->get()):count(NGOs::where('priority_sector',$value)->get()).",";
                 $pie .= (count($sector) == $i)?"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."},";

                }
                $operation = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
                $k =0;
                $category1 = "";
                $column1 = "";
                $pie1 = "";
                foreach($operation as $value){
                $k++;
                 $category1 .= (count($operation) == $i)?"'$value'":"'$value',";
                 $column1 .= (count($operation) == $i)?count(NGOs::where('operation_level',$value)->get()):count(NGOs::where('operation_level',$value)->get()).",";
                 $pie1 .= (count($operation) == $i)?"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."},";

                }

?>
    $(function () {
        $("#practices").load("<?php echo url('practices') ?>");
        $('#visits').highcharts({
            title: {
                text: 'NGO Sectoral Distribution'
            },
            xAxis: {
                categories: [<?php echo $category ?>]
            },
            labels: {
                items: [{
                    html: 'NGO Sectoral Distribution',
                    style: {
                        left: '150px',
                        top: '0px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                data: [<?php echo $column ?>]
            }, {
                type: 'spline',
                name: 'Average',
                data: [<?php echo $column ?>],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'NGOs',
                data: [<?php echo $pie ?>],
                center: [50, 20],
                size: 120,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
        $('#visits1').highcharts({
            title: {
                text: 'NGO Operational Areas'
            },
            xAxis: {
                categories: [<?php echo $category1 ?>]
            },
            labels: {
                items: [{
                    html: 'NGO Operational Areas',
                    style: {
                        left: '150px',
                        top: '0px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                data: [<?php echo $column1 ?>]
            }, {
                type: 'spline',
                name: 'Average',
                data: [<?php echo $column1 ?>],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'NGOs',
                data: [<?php echo $pie1 ?>],
                center: [50, 20],
                size: 120,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });


</script>


@stop