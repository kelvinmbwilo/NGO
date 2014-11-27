@extends("layout.master")

@section('breadcrumbs')
<li><a href="{{ url('ngos') }}">NGOs</a></li>
<li class="active">Sectors</li>
@stop

@section('header')
{{ $ngo->name }} Sectors
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('NGO.sectors.list')
</div>
@stop