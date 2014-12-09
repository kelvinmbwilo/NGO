@extends('layout.master')

@section('breadcrumbs')
<li>statistics</li>
@stop

@section('header')
Financial Reports
@stop

@section('contents')
<table class="table table-bordered table-responsive" id="exampleall">
    <thead>
    <tr>
        <th>NGO</th>
        <th>Year</th>
        <th>Income</th>
        <th>Expenditure</th>
        <th>Income Less Expenditure</th>
        <th>Assets</th>
        <th>Liabilities</th>
        <th>Net Worth</th>
    </tr>
    </thead>
   <tbody>
   @foreach(Expendeture::all() as $sector)
   <?php
   if($sector->NGOs){
   $income = RevenueIncome::where('NGO_id',$sector->NGOs->id)->first();
   ?>
   <tr>
       <td>@if($sector->NGOs) {{ $sector->NGOs->name }} @endif</td>
       <td>@if( $sector->AnnualReport ) {{ $sector->AnnualReport->report_date }} @endif</td>
       <td>{{ $income->total }}</td>
       <td>{{ $sector->total }}</td>
       <td>{{{ $income->total - $sector->total }}}</td>
       <td>{{ $sector->assets }}</td>
       <td>{{ $sector->liabilities }}</td>
       <td>{{{ $sector->assets - $sector->liabilities }}}</td>
   </tr>

<?php
}
   ?>
   @endforeach
   </tbody>

</table>
<script>
    $(document).ready(function(){
        $('#exampleall').dataTable();
    })
</script>
@stop