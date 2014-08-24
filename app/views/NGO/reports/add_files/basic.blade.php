<!--                <div class='form-group'>-->
@if(isset($ngo))
Name: {{ $ngo->name }}<br>
Registratin Date: {{ $ngo->registation_date }}<br>
Phone Number: {{ $ngo->phone_number }}<br>
Region: {{ $ngo->ndistrict->district }}<br><br>

@else
Select NGO<br>{{ Form::select('region',NGOs::all()->lists('name','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
@endif

Report Was made up on <br> {{ Form::text('reg_date','',array('class'=>'dat form-control','placeholder'=>'Report Date','required'=>'required')) }}

report covers the period that ended 31st December, year <br> {{ Form::select('age',array(''=>'--Select--')+array_combine(range(date('Y'),1940),range(date('Y'),1940)),'',array('class'=>'form-control','required'=>'requiered')) }}


Annual general or extra ordinary meeting Date <br> {{ Form::text('reg_date','',array('class'=>'dat form-control','placeholder'=>'Annual general or extra ordinary meeting Date','required'=>'required')) }}

<script>
    $(".dat").datepicker({
        dateFormat:"yy-mm-dd"
    });
</script>