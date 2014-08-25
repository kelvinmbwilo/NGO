@extends("layout.master")

@section('breadcrumbs')
<li><a href="{{ url('ngos') }}">NGOs</a></li>
<li class="active">Employee/Bearers</li>
@stop

@section('header')
{{ $ngo->name }} Employee/Bearers
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('NGO.employee.list')
</div>
@stop