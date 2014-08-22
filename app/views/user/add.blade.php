<?php
$region = array();
$district = array();
$role = array();
if(Auth::user()->role_id == "National" || Auth::user()->role_id == "National IVD" || Auth::user()->role_id == "admin"){
    $region = Region::all()->lists('region','id');
    $district = District::orderBy('district','ASC')->get()->lists('district','id');
    $role = array("admin"=>"Administrator","National IVD"=>"National IVD","National"=>"National Store","Region"=>"Region Store","District"=>"District Store");
}elseif(Auth::user()->role_id == "Region" ){
    $region = array(Auth::user()->region->id => Auth::user()->region->region);
    $district = Auth::user()->region->district->lists('district','id');
    $role = array(""=>'Select District',"District"=>"District Store");
}
?>
    <div class="panel panel-default">
      <div class="panel-body">
         {{ Form::open(array("url"=>route('adduser1'),"class"=>"form-horizontal","id"=>'FileUploader')) }}
          <div class='form-group'>

                <div class='col-sm-6'>
                    First Name <br>  {{ Form::text('firstname','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
                </div>
                <div class='col-sm-6'>
                  Middle Name <br> {{ Form::text('middlename','',array('class'=>'form-control','placeholder'=>'Middle Name','required'=>'required')) }}
                </div>

            </div>

              <div class='form-group'>
                    <div class='col-sm-6'>
                      Surname <br> {{ Form::text('lastname','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
                    </div>
                  <div class='col-sm-6'>
                      Username <br> {{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username','required'=>'required')) }}
                  </div>
            </div>

            <div class='form-group'>

                    <div class='col-sm-6'>
                        Email<br>{{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
                    </div>
                    <div class='col-sm-6'>
                        Title <br>{{ Form::text('title','',array('class'=>'form-control','placeholder'=>'Title','required'=>'required')) }}
                    </div>

                </div>

             <div class='form-group'>
                 <div class='col-sm-6'>
                     Password<br>{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'=>'required')) }}
                 </div>
                 <div class='col-sm-6'>
                     Re-Password <br> {{ Form::password('repassword',array('class'=>'form-control','placeholder'=>'Re-Password','required'=>'required')) }}
                 </div>
             </div>
          <div id="output"></div>
       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Add User',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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

            var area = $("#area").html();
            var dis = $("#disarea").html();
            var reg = $("#regarea").html();
            $("#disarea,#regarea").html("");
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
