@extends("layout.master")

@section('breadcrumbs')
<li><a href="{{ url('ngos') }}">NGOs</a></li>
<li class="active">Annual Reports</li>
@stop

@section('header')
<b>{{ $sector->sector_name }}</b> Annual Reports for NGO <b>{{ $ngo->name }}</b>
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('NGO.sectors.reports.list')
</div>
@stop