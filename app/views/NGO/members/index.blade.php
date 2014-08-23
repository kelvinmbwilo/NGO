@extends("layout.master")

@section('breadcrumbs')
<li><a href="{{ url('ngos') }}">NGOs</a></li>
<li class="active">Members</li>
@stop

@section('header')
{{ $ngo->name }} Members
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('NGO.members.list')
</div>
@stop