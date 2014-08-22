@extends("layout.master")

@section('breadcrumbs')
<li class="active">users</li>
@stop

@section('header')
System Users
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
    @include('NGO.list')
</div>
@stop