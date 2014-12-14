<?php
/**
 * Created by leonard
 * Date: 11/25/14
 * Time: 2:56 PM
 */

 $region = array();
 $district = array();

 ?>
 <div class="panel panel-default">
     <div class="panel-body">
        @if(isset($id))

         {{ Form::open(array("url"=>url('sector/add/'.$id),"class"=>"form-horizontal","id"=>'FileUploader')) }}
        @else
         {{ Form::open(array("url"=>url('sector/add'),"class"=>"form-horizontal","id"=>'FileUploader')) }}
         @endif

         <div class='form-group'>
             @foreach(NGOs::find($id)->Sectors() as $sect)
                {{ $sect->Sectors()->sector_name }}
             @endforeach

             <div class='col-sm-6'>
                 Sector Name <br>
                 <select name="sector_name" class="form-control" required="required">
                 <option selected disabled> -- Select Sector --</option>
                 @foreach( Sector::all() as $sector)
                 <option value="{{ $sector->id }}">{{ $sector->sector_name }}</option>
                 @endforeach
                 </select>
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
