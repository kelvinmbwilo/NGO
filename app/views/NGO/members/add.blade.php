
<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>url("ngo/{$ngo->id}/member/add"),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
                Full Name <br>  {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Full Name','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Position <br>{{ Form::text('position','',array('class'=>'form-control','placeholder'=>'Position','required'=>'required')) }}
            </div>

        </div>

        <div class='form-group'>
            <div class='col-sm-6'>
                Sex <br> {{ Form::select('sex',array(''=>'--Select--','Male'=>'Male','Female'=>'Female'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-6'>
                Year Of Birth <br> {{ Form::select('age',array(''=>'--Select--')+array_combine(range(date('Y'),1940),range(date('Y'),1940)),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <script>
                $(".dat").datepicker({
                    dateFormat:"yy-mm-dd"
                });
            </script>
        </div>

        <div class='form-group' id="area">
            <div class='col-sm-6' id="regarea">
                Nationality<br>{{ Form::select('country',Country::all()->lists('name','id'),'466',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-6' id="disarea">
                Year of Admission<br>{{ Form::select('admission',array(''=>'--Select--')+array_combine(range(date('Y'),1940),range(date('Y'),1940)),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
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

        function afterSuccess(){
            setTimeout(function() {
                $("#myModal").modal("hide");
            }, 3000);
            $("#listuser").load("<?php echo url("ngo/{$ngo->id}/member/list") ?>")
        }
    });
</script>
