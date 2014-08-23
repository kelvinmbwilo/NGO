<?php
$region = array();
$district = array();

?>
<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>url('ngo/add'),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
                NGO Name <br>  {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'NGO Name','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Certificate No<br>{{ Form::text('certificate','',array('class'=>'form-control','placeholder'=>'Certificate No','required'=>'required')) }}
            </div>

        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Registration Type <br> {{ Form::text('reg_type','',array('class'=>'form-control','placeholder'=>'Registration Type','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Postal Address <br> {{ Form::text('postal','',array('class'=>'form-control','placeholder'=>'Postal Address','required'=>'required')) }}
            </div>
        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Email<br>{{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Phone Number<br>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }}
            </div>
        </div>

        <div class='form-group' id="area">
            <div class='col-sm-6' id="regarea">
                Region<br>{{ Form::select('region',Region::all()->lists('region','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-6' id="disarea">
                District<br><span id="district-area">{{ Form::select('district',$district,'',array('class'=>'form-control','required'=>'requiered')) }}</span>
            </div>
        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Priority Sector<br>{{ Form::text('sector','',array('class'=>'form-control','placeholder'=>'Priority Sector','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Registration Date <br> {{ Form::text('reg_date','',array('class'=>'dat form-control','placeholder'=>'Registration Date','required'=>'required')) }}
            </div>
            <script>
                $(".dat").datepicker({
                    dateFormat:"yy-mm-dd"
                });
            </script>

        </div>
        <div id="output"></div>
        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
<script>
    $(document).ready(function (){
        $('#FileUploader').on('submit', function(e) {
            e.preventDefault();
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });

        var dis = $("#disarea").html();

        $("select[name=region]").change(function(){
            $("#district-area").html("<i class='fa fa-spinner fa-spin'></i> Wait... ")
            $.post("<?php echo url('user/region_check') ?>/"+$(this).val(),function(dat){
                $("#district-area").html(dat);
            })
        })

        function afterSuccess(){
            setTimeout(function() {
                $("#myModal").modal("hide");
            }, 3000);
            $("#listuser").load("<?php echo url("ngo/list") ?>")
        }
    });
</script>
