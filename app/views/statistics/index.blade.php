@extends('layout.master')

@section('breadcrumbs')
<li>statistics</li>
@stop

@section('header')
Reports
@stop

@section('contents')
<div class="row filters">
    <div class="col-sm-3">
        Report by<br>
        <select class="form-control">
            <option value="level">Operational Level</option>
            <option value="sector">Priority Sectors</option>
            <option value="empstatus">Employment status</option>
        </select>
    </div>
    <div class="col-sm-3 ngo">
        Region<br>
        {{ Form::select('region',Region::all()->lists('region','id'),'',array('class'=>'form-control','required'=>'requiered')) }}

    </div>
    <div class="col-sm-3 ngo">
        District<br>
        <span id="district-area">{{ Form::select('district',District::all()->lists('district','id'),'',array('class'=>'form-control','required'=>'requiered')) }}</span>
    </div>
    <div class="col-sm-3 ngo">
        Operation Level<br>
        <select class="form-control">
            <option value="international">International</option>
            <option value="national">National</option>
            <option value="region">Region</option>
            <option value="region">District</option>
        </select>
    </div>
    <div class="col-sm-3 ngo">
        Priority Sector<br>
        <select class="form-control">
            <option value="internatial">All</option>
            <option value="international">Health</option>
            <option value="national">Gender</option>
            <option value="region">Social Development</option>
            <option value="region">HIV & AIDS</option>
        </select>
    </div>
    <div class="col-sm-3 employee">
        Nationality<br>
        {{ Form::select('country',Country::all()->lists('name','id'),'466',array('class'=>'form-control','required'=>'requiered')) }}

    </div>
    <div class="col-sm-3 employee">
        Gender<br>
        <select class="form-control">
            <option value="international">All</option>
            <option value="national">Male</option>
            <option value="region">Female</option>
        </select>
    </div>
    <div class="col-sm-3 employee">
        Employment Status<br>
        <select class="form-control">
            <option value="international">All</option>
            <option value="national">Volunteer</option>
            <option value="region">Employee</option>
        </select>
    </div>
</div>

<div class="col-md-12 chat_types" style="margin-top: 10px">
    <button id="table" class="btn btn-info btn-xs col-sm-2">Table</button>
    <button id="bar" class="btn btn-info btn-xs col-sm-2" style="margin-left: 30px">Bar Chat</button>
    <button id="line" class="btn btn-info btn-xs col-sm-2" style="margin-left: 30px">Line Chat</button>
    <button id="pie" class="btn btn-info btn-xs col-sm-2" style="margin-left: 30px">Pie Chat</button>
    <div class="btn-group">
    <button id="export"  style="margin-left: 30px" class="btn btn-info btn-xs col-sm-12 dropdown-toggle" data-toggle="dropdown">
        export <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Excel</a></li>
        <li><a href="#">Pdf</a></li>
        <li><a href="#">XML</a></li>
    </ul>
        </div>
</div>

<div class="col-sm-12" style="margin-top: 20px" id="container">

</div>

<script>
    $(document).ready(function (){
        $(".chat_types").find('button').click(function(){
            $('#container').html("<i class='fa fa-spin fa-spinner fa-3x'></i> Please wait ");
        })
        var dis = $("#disarea").html();

        $("select[name=region]").change(function(){
            $("#district-area").html("<i class='fa fa-spinner fa-spin'></i> Wait... ")
            $.post("<?php echo url('user/region_check') ?>/"+$(this).val(),function(dat){
                $("#district-area").html(dat);
            })
        })


    });
</script>
@stop