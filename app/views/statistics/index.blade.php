@extends('layout.master')

@section('breadcrumbs')
<li>statistics</li>
@stop

@section('header')
Reports
@stop

@section('contents')
<div class="row filters">
<form method="post" action="{{ url('getreport') }}" id="reportform">
    <div class="col-sm-3 ngo">
        Region<br>
        {{ Form::select('region[]',Region::all()->lists('region','id'),'',array('multiple'=>"multiple",'class'=>'form-control multi','id'=>'regions')) }}

    </div>
    <div class="col-sm-3  col-sm-offset-1 ngo" >
        District<br>
        <span id="">{{ Form::select('district[]',District::all()->lists('district','id'),'',array('multiple'=>"multiple",'class'=>'form-control multi')) }}</span>
    </div>
    <div class="col-sm-3 col-sm-offset-1  ngo">
        Operation Level<br>
        <select name="operation[]" class="form-control multi" multiple="multiple">
            <option value="international">International</option>
            <option value="national">National</option>
            <option value="region">Region</option>
            <option value="region">District</option>
        </select>
    </div>
    <div class="col-sm-3 ngo">
        Priority Sector<br>
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
        )
        ?>
        {{ Form::select('sector[]',$sector,'',array('multiple'=>"multiple",'class'=>'form-control multi')) }}

    </div>
    <div class="col-sm-3 col-sm-offset-1">
        Report by<br>
        <select class="form-control input-sm" name="operate">
            <option value="level">Operational Level</option>
            <option value="sector">Priority Sectors</option>
            <option value="Regions">Regions</option>
            <option value="Districts">Districts</option>
        </select>
    </div>

    <div class='col-sm-3 col-sm-offset-1 years'>
        &nbsp;&nbsp;&nbsp;&nbsp;Registration Dates<br>
        <div class='col-sm-6'>
            {{ Form::text('from','',array('class'=>'form-control','placeholder'=>'Start Date','id'=>'from')) }}
        </div>
        <div class='col-sm-6'>
            {{ Form::text('to','',array('class'=>'form-control','placeholder'=>'End Date','id'=>'to')) }}
        </div>
    </div>

</div>

<div class="col-md-12 chat_types" style="margin-top: 10px">
    <button type="button" id="records" class="btn btn-info btn-xs col-sm-1 ss">Records</button>
    <button type="button" id="table" class="btn btn-info btn-xs col-sm-1 ss" >Table</button>
    <button type="button" id="bar" class="btn btn-info btn-xs col-sm-1 ss" >Bar Chat</button>
    <button type="button" id="line" class="btn btn-info btn-xs col-sm-1 ss" >Line Chat</button>
    <button type="button" id="pie" class="btn btn-info btn-xs col-sm-1 ss" >Pie Chat</button>
    <button type="button" id="combined" class="btn btn-info btn-xs col-sm-1 ss" >Combined Chat</button>
    <button type="submit" name="excel" id="excel" class="btn btn-info btn-xs col-sm-1" >Excel</button>

</div>
</form>

<div class="col-sm-12" style="margin-top: 20px" id="container">

</div>
<div id="visits"></div>

<script>
    $(document).ready(function (){
        $('.multi').multiselect().multiselectfilter();

        $( "#from" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd",
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd",
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        $('.ss').unbind('click').click(function(){
            $('#visits').html("")
            var id = $(this).attr('id');
            $('#reportform').find('input[name=chart]').remove();
            $('#reportform').append("<input type='hidden' name='chart' value='"+id+"'>")
            $(".chat_types").find('button').removeClass('btn-warning').addClass('btn-info');
            $(this).removeClass('btn-info').addClass('btn-warning');
//            $('#container').html("<i class='fa fa-spin fa-spinner fa-3x'></i>Fetching report please wait ");
            $('#reportform').ajaxSubmit({
                    target: '#container',
                    success:  afterSuccess
                });

            });


        $("#table").trigger('click');
        function afterSuccess(){

        }

        //submiting the report form



    });
</script>
@stop