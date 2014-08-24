@extends("layout.master")

@section('breadcrumbs')
<li><a href="{{ url('ngos') }}">NGOs</a></li>
<li class="active">Annual Reports</li>
@stop

@section('header')
{{ $ngo->name }} Annual Reports
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('NGO.reports.list')
</div>
@stop