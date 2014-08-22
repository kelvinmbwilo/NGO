@extends('layout.master')

@section('breadcrumbs')
 <li class="active">Reports</li>
@stop

@section('header')
  Yearly Report
@stop

@section('contents')
   @include('reports.list')
@stop