@extends("layout.master")

@section('breadcrumbs')
<li class="active">NGOs</li>
@stop

@section('header')
NGOs Management
@stop

@section('contents')
<div class="col-sm-12" id="listuser">
<div role="tabpanel">


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#ngos" aria-controls="ngos" role="tab" data-toggle="tab">NGOs</a></li>
    <li role="presentation"><a href="#sectors" aria-controls="sectors" role="tab" data-toggle="tab">Sectors</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="ngos">
    @include('NGO.list')
    </div>
    <div role="tabpanel" class="tab-pane" id="sectors">
    @include('SECTOR.list')
    </div>
  </div>

</div>
</div>
@stop