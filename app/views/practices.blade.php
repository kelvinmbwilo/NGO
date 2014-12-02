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
            <li><a href="#International" role="tab" data-toggle="tab">International</a> </li>
            <li><a href="#National" role="tab" data-toggle="tab">National</a> </li>
            <li><a href="#Region" role="tab" data-toggle="tab">Region</a> </li>
            <li><a href="#District" role="tab" data-toggle="tab">District</a> </li>

        </ul>
    </li>
    <li class="dropdown">
        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            Priority Sectors <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            @foreach(Sector::all() as $sector)
             <li><a href="#sector{{ $sector->id }}" role="tab" data-toggle="tab">{{ $sector->sector_name }}</a> </li>
            @endforeach
        </ul>
    </li>
</ul>
<style>
    .pract{
        height: 400px;
        width: 100%;
        overflow-y: scroll;
    }
</style>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::all()) == 0)
                <h4 class="text-center">No NGOs Good Practices</h4>
                @else
                <h4 class="text-center">NGOs Good Practices</h4>
                @endif
                @foreach(NGOPractices::all() as $practice)
                    <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                    <p>{{ $practice->description }}</p>

                @endforeach
            </div>
    </div>
        </div>
    @foreach(Region::all() as $region)
    <div class="tab-pane" id="region{{ $region->id }}">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::whereIn('NGO_id',NGOs::where('region',$region->id)->lists('id')+array(0))->get()) == 0)
                <h4 class="text-center">No NGOs Good Practices For {{ $region->region }} Region</h4>
                @else
                <h4 class="text-center">NGOs Good Practice For {{ $region->region }} Region</h4>
                @endif
                @foreach(NGOPractices::whereIn('NGO_id',NGOs::where('region',$region->id)->lists('id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>{{ $practice->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
<?php
    $array = array(
    "Agriculture"=>"Agriculture and Food Security",
    "Education"=>"Education and Training",
    "Health"=>"Health and HIV/AIDS",
    "Tourism"=>"Tourism and Wildlife",
    "Social"=>"Social Security and Social Protection",
    "Legal"=>"Legal and Human Rights",
    "Good"=>"Good Governance",
    "Gender"=>"Gender and Women Empowerment",
    "Water"=>"Water and Sanitation",
    "Environment"=>"Environment and Climate Change",
    "Labor"=>"Labor and Employment",
    "Finance"=>"Finance",
    "Mineral"=>"Mineral and Energy ",
    "Sports"=>"Sports and Culture",
    "Transport"=>"Transport and Infrastructure",
    );
?>
    @foreach(Sector::all() as $sector)
    <div class="tab-pane" id="sector{{ $sector->id }}">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::whereIn('NGO_id',NGOSector::where('sector_id',$sector->id)->lists('n_gos_id')+array(0))->get()) == 0)
                <h4 class="text-center">No NGOs Good Practices For {{ $sector->sector_name }} Sector</h4>
                @else
                <h4 class="text-center">NGOs Good Practice For {{ $sector->sector_name }} Sector</h4>
                @endif
                @foreach(NGOPractices::whereIn('NGO_id',NGOSector::where('sector_id',$sector->id)->lists('n_gos_id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>{{ $practice->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <div class="tab-pane" id="International">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"International")->lists('id')+array(0))->get()) == 0)
                <h4 class="text-center">No  Good Practices For NGOs That Operate International </h4>
                @else
                <h4 class="text-center">Good Practice For NGOs That Operate International</h4>
                @endif
                @foreach(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"International")->lists('id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>{{ $practice->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane" id="National">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"National")->lists('id')+array(0))->get()) == 0)
                <h4 class="text-center">No Good Practices For NGOs That Operate National </h4>
                @else
                <h4 class="text-center">Good Practice For NGOs That Operate National</h4>
                @endif
                @foreach(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"National")->lists('id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>{{ $practice->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane" id="Region">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"Region")->lists('id')+array(0))->get()) == 0)
                <h4 class="text-center">No Good Practices For NGOs That Operate Region </h4>
                @else
                <h4 class="text-center">Good Practice For NGOs That Operate Region</h4>
                @endif
                @foreach(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"Region")->lists('id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>{{ $practice->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane" id="District">
        <div class="media">
            <div class="media-body pract">
                @if(count(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"District")->lists('id')+array(0))->get()) == 0)
                <h4 class="text-center">No Good Practices For NGOs That Operate District </h4>
                @else
                <h4 class="text-center">Good Practice For NGOs That Operate District</h4>
                @endif
                @foreach(NGOPractices::whereIn('NGO_id',NGOs::where('operation_level',"District")->lists('id')+array(0))->get() as $practice)
                <h4 class="media-heading">@if($practice->NGOs){{ $practice->NGOs->name }}@endif</h4>
                <p>{{ $practice->description }}
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".summ").click(function(){
            var id1 = $(this).parent().attr('id');
            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modal+= '<div class="modal-dialog">';
            modal+= '<div class="modal-content">';
            modal+= '<div class="modal-header">';
            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal+= '<h2 class="modal-title" id="myModalLabel">Update NGO  Information</h2>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';
            modal+= ' </div>';
            modal+= '</div>';
            modal+= '</div>';

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("ngo/edit") ?>/"+id1);
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })
        })
    })

</script>