@extends('layout.master')

@section('breadcrumbs')

@stop

@section('header')

@stop

@section('contents')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <h3 class="text-center">{{ $ngo->name }}</h3>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="databox radius-bordered databox-shadowed databox-graded">
                    <div class="databox-left bg-themesecondary">
                        <div class="databox-piechart">
                            <div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)"><span class="white font-90"></span></div>
                        </div>
                    </div>
                    <div class="databox-right">
                        <span class="databox-number themesecondary"></span>
                        <div class="databox-text darkgray">{{ $ngo->name }}</div>
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
                        <span class="databox-number themethirdcolor col-xs-4" style="padding: 2px;font-size: 11px">All {{ count(NGOsMembers::where('NGO_id',$ngo->id)->get()) }}</span>
                        <span class="databox-number themethirdcolor  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-male"></i> {{ count(NGOsMembers::where('sex','Male')->where('NGO_id',$ngo->id)->get()) }}</span>
                        <span class="databox-number themethirdcolor  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-female"></i> {{ count(NGOsMembers::where('sex','Female')->where('NGO_id',$ngo->id)->get()) }}</span>
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
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px">All {{ count(EmploymentParticulars::where('employement_status','Employee')->where('NGO_id',$ngo->id)->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-male"></i> {{ count(EmploymentParticulars::where('employement_status','Employee')->where('NGO_id',$ngo->id)->where('gender','Male')->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-female"></i> {{ count(EmploymentParticulars::where('employement_status','Employee')->where('NGO_id',$ngo->id)->where('gender','Female')->get()) }}</span>
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
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px">All {{ count(EmploymentParticulars::where('employement_status','Volunteer')->where('NGO_id',$ngo->id)->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-male"></i> {{ count(EmploymentParticulars::where('employement_status','Volunteer')->where('NGO_id',$ngo->id)->where('gender','Male')->get()) }}</span>
                        <span class="databox-number themeprimary  col-xs-4" style="padding: 2px;font-size: 11px"> <i class="fa fa-female"></i> {{ count(EmploymentParticulars::where('employement_status','Volunteer')->where('NGO_id',$ngo->id)->where('gender','Female')->get()) }}</span>
                        <div class="databox-text darkgray col-xs-11">VOLUNTEER</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop