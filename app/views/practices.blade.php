<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 10/15/14
 * Time: 6:53 PM
 */
?>
<!-- Nav tabs -->
<h3 class="text-center">NGO Best Practices</h3>
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#home" role="tab" data-toggle="tab">All</a></li>
    <li class="dropdown">
        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            Region <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            @foreach(Region::all() as $region)
            <li><a href="#region{{ $region->id }}" role="tab" data-toggle="tab">{{ $region->region }}</a> </li>
            @endforeach
        </ul>
    </li>
    <li class="dropdown">
        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            Operation Levels <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="#operation" role="tab" data-toggle="tab">International</a> </li>
            <li><a href="#operation" role="tab" data-toggle="tab">National</a> </li>
            <li><a href="#operation" role="tab" data-toggle="tab">Region</a> </li>
            <li><a href="#operation" role="tab" data-toggle="tab">District</a> </li>

        </ul>
    </li>
    <li class="dropdown">
        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            Priority Sectors <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="#profile" role="tab" data-toggle="tab">Agriculture and Food Security</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Education and Training</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Health and HIV/AIDS</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Tourism and Wildlife</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Tourism and Wildlife</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Social Security and Social Protection</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Legal and Human Rights</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Good Governance</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Gender and Women Empowerment</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Water and Sanitation</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Environment and Climate Change</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Labor and Employment</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Finance</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Mineral and Energy</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Sports and Culture</a> </li>
            <li><a href="#sector" role="tab" data-toggle="tab">Transport and Infrastructure</a> </li>
        </ul>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home">
        <div class="media">
            <div class="media-body">

                @foreach(NGOPractices::all() as $practice)
                    <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                    <p>jkljflk fkdsjklfsd lkjfkldglfd slkfdsjlfds</p>
                @endforeach
            </div>
    </div>
        </div>
    @foreach(Region::all() as $region)
    <div class="tab-pane" id="region{{ $region->id }}">
        <div class="media">
            <div class="media-body">
                {{ $region->region }}
                @foreach(NGOPractices::whereIn('NGO_id',NGOs::where('region',$region->id)->lists('id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>jkljflk fkdsjklfsd lkjfkldglfd slkfdsjlfds</p>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    <div class="tab-pane" id="profile">
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                <p>jkljflk fkdsjklfsd lkjfkldglfd slkfdsjlfds</p>
            </div><div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                <p>jkljflk fkdsjklfsd lkjfkldglfd slkfdsjlfds</p>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="messages">...</div>
    <div class="tab-pane" id="settings">...</div>
</div>