
<div class="panel panel-default">
    <div class="panel-body">
        {{ Form::open(array("url"=>url("sector/edit/{$sector->id}"),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        <div class='form-group'>

            <div class='col-sm-6'>
               Sector Name <br>  {{ Form::text('sector_name',$sector->sector_name,array('class'=>'form-control','','required'=>'required')) }}
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
             //Notify('Thank You! All of your information saved successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
             setTimeout(function() {
                 $("#myModal").modal("hide");
             }, 1000);
             $("#sectors").load("<?php echo url("sectors") ?>")
         }
    });
</script>
