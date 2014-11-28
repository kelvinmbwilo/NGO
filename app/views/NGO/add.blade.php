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
                Registration No<br>{{ Form::text('certificate','',array('class'=>'form-control','placeholder'=>'Certificate No','required'=>'required')) }}
            </div>

        </div>
        <div class='form-group'>

            <div class='col-sm-6'>
                Registration Type <br>  {{ Form::select('reg_type',array(''=>'-Select-','Registered'=>'Normal','Compliance'=>'Compliance'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-6'>
                Level Of Operation<br>{{ Form::select('operation',array('International'=>'International','National'=>'National','Regional'=>'Regional','District'=>'District'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>

        </div>
        <div class='form-group'>
            <div class='col-sm-6'>
                <?php
                $sectors = array();
                ?>
                @foreach(Sector::all() as $sector)
                <?php
                    $sectors[$sector->id] = $sector->sector_name;
                ?>
                @endforeach
                Priority Sector<br>
                <select name="sector[]" class="form-control multiselect" multiple="multiple" >
                 @foreach(Sector::all() as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->sector_name }}</option>
                 @endforeach
                </select>
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

        <div class='form-group'>
            <div class='col-sm-6'>
                Email<br>{{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email')) }}
            </div>
            <div class='col-sm-6'>
                Phone Number<br>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number')) }}
            </div>
        </div>

        <div class='form-group' id="area">
            <div class='col-sm-6' id="regarea">
                Region<br>{{ Form::select('region',array('0'=>'-Select Region-')+Region::all()->lists('region','id'),'',array('class'=>'form-control')) }}
            </div>
            <div class='col-sm-6' id="disarea">
                District<br><span id="district-area">{{ Form::select('district',array('0'=>'-Select District-')+District::all()->lists('district','id'),'',array('class'=>'form-control')) }}</span>
            </div>
        </div>

        <div class='form-group'>

            <div class='col-sm-12'>
                Postal Address <br> {{ Form::text('postal','',array('class'=>'form-control','placeholder'=>'Postal Address')) }}
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

    $(".multiselect").multiselect(
                         {   header: "Select an option",
                             noneSelectedText: "Select an Option",
                             selectedList: 1,
                             click: function(event, ui){
                                if(ui.checked){
                                     console.log(ui);
                                }
                                }

                         }).multiselectfilter();

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

        }
    });
</script>
