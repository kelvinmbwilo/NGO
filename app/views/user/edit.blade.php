
<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>url("user/edit/{$user->id}"),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
                First Name <br>  {{ Form::text('firstname',$user->firstname,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Middle Name <br> {{ Form::text('middlename',$user->middlename,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
            </div>

        </div>

        <div class='form-group'>
        <div class='col-sm-6'>
            Surname<br> {{ Form::text('lastname',$user->lastname,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
        </div>

            <div class='col-sm-6'>
                Username <br> {{ Form::text('username',$user->username,array('class'=>'form-control','placeholder'=>'Middle Name')) }}
            </div>
        </div>

        <div class='form-group'>

            <div class='col-sm-6'>
                Email <br>{{ Form::email('email',$user->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
            </div>
            <div class='col-sm-6'>
                Title <br>{{ Form::text('title',$user->title,array('class'=>'form-control','required'=>'requiered')) }}
            </div>

        </div>


        <div id="output"></div>
       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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

        var area = $("#area").html();
        var dis = $("#disarea").html();
        var reg = $("#regarea").html();
        if($("select[name=role]").val() == "National" || $("select[name=role]").val() == "Administrator"){
            $("#disarea,#regarea").html("");
        }else if($("select[name=role]").val() == "Region"){
            $("#regarea").html(reg);
            $("#disarea").html("");
        }else if($("select[name=role]").val() == "District"){
            $("#disarea").html(dis);
            $("#regarea").html("");
        }

        $("select[name=role]").change(function(){
            if($(this).val() == "Region"){
                $("#regarea").html(reg);
                $("#disarea").html("");
            }else if($(this).val() == "District"){
                $("#disarea").html(dis);
                $("#regarea").html("");
            }else{
                $("#disarea,#regarea").html("");
            }
        })

        $("select[name=region]").change(function(){
            $("#district-area").html("<i class='fa fa-spinner fa-spin'></i> Wait... ")
            $.post("<?php echo url('user/region_check1') ?>/"+$(this).val(),function(dat){
                $("#district-area").html(dat);
            })
        })
        function afterSuccess(){
            setTimeout(function() {
                $("#myModal").modal("hide");
            }, 3000);
            $("#listuser").load("<?php echo url("user/list") ?>")
        }
    });
</script>


