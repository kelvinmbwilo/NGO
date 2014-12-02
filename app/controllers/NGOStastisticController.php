<?php

class NGOStastisticController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$condition = Input::get('registration');
        $ngo = DB::table('NGOs');


        $operate = Input::get('operate');
        $chart = Input::get('chart');
        $title = " ";

        if($condition == 'all'){
            $title .= " All NGOs ";
        }elseif($condition == 'registered'){
            $title .= " Normal NGOs ";
            $ngo->where('registation_type','Registered');
        }elseif($condition == 'compliance'){
            $title .= " Compliance NGOs ";
            $ngo->where('registation_type','Compliance');
        }
        if(Input::get('from') != "" && Input::get('to') != ""){
            $ngo->whereBetween('registation_date',array(Input::get('from'),Input::get('to')));
            $title .= " Between ".Input::get('from')." And ".Input::get('to');
        }
        if(count(Input::get('region')) != 0){
//            $ngo->whereIn('region',Input::get('region')+array('0'));
            $i = 0;
//            $title .= " From  ";
            foreach(Input::get('region') as $region){
                $i++;
//                $title .= (count(Input::get('region')) == $i)?Region::find($region)->region:Region::find($region)->region.", ";
            }
//                $title .= " Regions ";
        }
        if(count(Input::get('district')) != 0){
//            $ngo->whereIn('district',Input::get('district')+array('0'));
            $i = 0;
//            $title .= " From  ";
            foreach(Input::get('district') as $region){
                $i++;
//                $title .= (count(Input::get('district')) == $i)?District::find($region)->district:District::find($region)->district.", ";
            }
//            $title .= " Districts ";
        }




//        echo count($ngo->where('id','!=','0')->get());exit;
        if($chart =="records"){
            $this->records($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }elseif($chart =="bar"){
            $this->bar($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }elseif($chart =="table"){
            $this->table($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }elseif($chart == "line"){
            $this->line($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }elseif($chart == "combined"){
            $this->combined($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }elseif($chart == "pie"){
            $this->pie($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }elseif($chart == "column"){
            $this->column($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }
        if(isset($_POST['excel'])){
            $this->excelDownload1($ngo,Input::get('region'),Input::get('district'),Input::get('sector'),Input::get('operation'),$title,$operate,$condition);
        }

	}


	public function records($ngo,$region,$district,$sector,$operation,$title,$condition){
        ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
<?php echo $title ?>
                <button class="btn btn-primary btn-xs pull-left add" id="add"><i class="fa fa-plus"></i> add</button>
            </div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <?php
            if(count($ngo->where('id','!=','0')->get()) == 0){ ?>
            <h3>There are no NGOs registered to the system</h3>
<?php }else{ ?>
            <table class="table table-striped table-bordered" id="example2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Registration No </th>
                    <th> Registration Date </th>
                    <th> Registration Type </th>
                    <th> Phone Number</th>
                    <th> Email</th>
                    <th> Postal Address</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
<?php foreach($ngo->where('id','!=','0')->get() as $us){ ?>
<tr>
    <td><?php echo $i++ ?></td>
    <td style="text-transform: capitalize"><?php echo $us->name ?></td>
    <td><?php echo $us->certificate_no ?></td>
    <td><?php echo $us->registation_date ?></td>
    <td><?php echo $us->registation_type ?></td>
    <td><?php echo $us->phone_number ?></td>
    <td><a href="mailto:<?php $us->email ?>"><?php echo $us->email ?></a></td>
    <td><?php echo $us->postal_adress ?></td>

</tr>
            <?php } ?>
</tbody>
</table>

<?php } ?>
</div>
</div>
</div>
        <script>
            /* Table initialisation */
            $(document).ready(function() {
                $('#example2').dataTable({
                    "fnDrawCallback": function( oSettings ) {

                    }
                });

                $('input[type="text"]').addClass("form-control");
                $('select').addClass("form-control");

                //managing the add button
                $(".add").click(function(){
                    var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                    modal+= '<div class="modal-dialog">';
                    modal+= '<div class="modal-content">';
                    modal+= '<div class="modal-header">';
                    modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                    modal+= '<h2 class="modal-title" id="myModalLabel">Add New NGO</h2>';
                    modal+= '</div>';
                    modal+= '<div class="modal-body">';
                    modal+= ' </div>';
                    modal+= '</div>';
                    modal+= '</div>';

                    $("body").append(modal);
                    $("#myModal").modal("show");
                    $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                    $(".modal-body").load("<?php echo url("ngo/add/") ?>");
                    $("#myModal").on('hidden.bs.modal',function(){
                        $("#myModal").remove();
                    })

                })

            } );
        </script>
<?php
    }

    public function table($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
if($operate == "sector"){
    if(count($sector) == 0){
       $array = Sector::all()->lists('sector_name','id');
    }else{
        foreach ($sector as $sec){
            $array[$sec] = $sec;
        }
    }
   $columnss = "priority_sector";
    $tabletitle = "Priority Sector";

}
elseif($operate == "level"){
    if(count($operation) == 0){
        $array = array(
            'International'=>'International',
            'National'=>'National',
            'Regional'=>'Regional',
            'District'=>'District'
        );
    }else{
        foreach ($operation as $sec){
            $array[$sec] = $sec;
        }
    }
    $columnss = "operation_level";
    $tabletitle = "Operation Level";

}
elseif($operate == "Regions"){
    if(count($region) == 0 ){
        $array = Region::all()->lists('region','id');
    }else{
        foreach ($region as $sec){
            $array[$sec] = Region::find($sec)->region;
        }
    }
    $columnss = "region";
    $tabletitle = "Region";

}
elseif($operate == "Districts"){
    if(count($district) == 0){
        $array = District::all()->lists('district','id');
    }else{
        foreach ($district as $sec){
            $array[$sec] = District::find($sec)->district;
        }
    }
    $columnss = "district";
    $tabletitle = "Districts";

}
//   var_dump($ngo->where($columnss,"National")->get());exit;

    $i =0;
        echo "<h3>$title</h3>";
    echo "<table class='table table-striped table-bordered' id='example7'>";
    echo "<tr>";
    echo "<th>No#</th>";
    echo "<th>".$tabletitle."</th>";
    echo "<th>Number</th>";
    echo "</tr>";
    foreach($array as $key => $value){
        $i++;
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$value."</td>";
        if($condition == "all"){
            if($operate == "sector")
                echo "<td>".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."</td>";
            else
                echo "<td>".count(NGOs::where("$columnss",$key)->get())."</td>";
        }else{
            if($operate == "sector")
                echo "<td>".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."</td>";
            else
                echo "<td>".count(NGOs::where("$columnss",$key)->where('registation_type',$condition)->get())."</td>";
        }

        echo "</tr>";
    }

    echo "</table>";

}
    public function bar($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
        if($operate == "sector"){
            if(count($sector) == 0){
                $array = Sector::all()->lists('sector_name','id');
            }else{
                foreach ($sector as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "priority_sector";
            $tabletitle = "Priority Sector";

        }
        elseif($operate == "level"){
            if(count($operation) == 0){
                $array = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
            }else{
                foreach ($operation as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "operation_level";
            $tabletitle = "Operation Level";

        }
        elseif($operate == "Regions"){
            if(count($region) == 0 ){
                $array = Region::all()->lists('region','id');
            }else{
                foreach ($region as $sec){
                    $array[$sec] = Region::find($sec)->region;
                }
            }
            $columnss = "region";
            $tabletitle = "Region";

        }
        elseif($operate == "Districts"){
            if(count($district) == 0){
                $array = District::all()->lists('district','id');
            }else{
                foreach ($district as $sec){
                    $array[$sec] = District::find($sec)->district;
                }
            }
            $columnss = "district";
            $tabletitle = "Districts";

        }
                $k =0;
                $category1 = "";
                $column1 = "";
                $pie1 = "";
                foreach($array as $key=>$value){
                    $k++;
                    if($condition == "all"){
                        if($operate == "sector"){
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."},";
                        }else{
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->get()):count(NGOs::where($columnss,$key)->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."},";
                        }
                    }else{
                        if($operate == "sector"){
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."},";
                        }else{
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()):count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."},";
                        }

                    }

                }
        ?>
        <script>
            $(function () {
               $('#visits').highcharts({
                    title: {
                        text: '<?php echo $title ?>'
                    },
                    xAxis: {
                        categories: [<?php echo $category1 ?>]
                    },
                    labels: {
                        items: [{
                            html: '<?php echo $title ?>',
                            style: {
                                left: '150px',
                                top: '0px',
                                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                            }
                        }]
                    },
                    series: [{
                        type: 'column',
                        data: [<?php echo $column1 ?>]
                    }
                    ]
                });
            });
        </script>
    <?php
}
public function column($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
        if($operate == "sector"){
            if(count($sector) == 0){
                $array = Sector::all()->lists('sector_name','id');
            }else{
                foreach ($sector as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "priority_sector";
            $tabletitle = "Priority Sector";

        }
        elseif($operate == "level"){
            if(count($operation) == 0){
                $array = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
            }else{
                foreach ($operation as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "operation_level";
            $tabletitle = "Operation Level";

        }
        elseif($operate == "Regions"){
            if(count($region) == 0 ){
                $array = Region::all()->lists('region','id');
            }else{
                foreach ($region as $sec){
                    $array[$sec] = Region::find($sec)->region;
                }
            }
            $columnss = "region";
            $tabletitle = "Region";

        }
        elseif($operate == "Districts"){
            if(count($district) == 0){
                $array = District::all()->lists('district','id');
            }else{
                foreach ($district as $sec){
                    $array[$sec] = District::find($sec)->district;
                }
            }
            $columnss = "district";
            $tabletitle = "Districts";

        }
                $k =0;
                $category1 = "";
                $column1 = "";
                $pie1 = "";
                foreach($array as $key=>$value){
                    $k++;
                    if($condition == "all"){
                        if($operate == "sector"){
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."},";
                        }else{
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->get()):count(NGOs::where($columnss,$key)->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."},";
                        }
                    }else{
                        if($operate == "sector"){
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."},";
                        }else{
                            $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                            $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()):count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()).",";
                            $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."},";
                        }

                    }
                }
        ?>
        <script>
            $(function () {
               $('#visits').highcharts({
                    title: {
                        text: '<?php echo $title ?>'
                    },
                    xAxis: {
                        categories: [<?php echo $category1 ?>]
                    },
                    labels: {
                        items: [{
                            html: '<?php echo $title ?>',
                            style: {
                                left: '150px',
                                top: '0px',
                                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                            }
                        }]
                    },
                    series: [{
                        type: 'bar',
                        data: [<?php echo $column1 ?>]
                    }
                    ]
                });
            });
        </script>
    <?php
}

    public function line($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
        if($operate == "sector"){
            if(count($sector) == 0){
                $array = Sector::all()->lists('sector_name','id');
            }else{
                foreach ($sector as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "priority_sector";
            $tabletitle = "Priority Sector";

        }
        elseif($operate == "level"){
            if(count($operation) == 0){
                $array = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
            }else{
                foreach ($operation as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "operation_level";
            $tabletitle = "Operation Level";

        }
        elseif($operate == "Regions"){
            if(count($region) == 0 ){
                $array = Region::all()->lists('region','id');
            }else{
                foreach ($region as $sec){
                    $array[$sec] = Region::find($sec)->region;
                }
            }
            $columnss = "region";
            $tabletitle = "Region";

        }
        elseif($operate == "Districts"){
            if(count($district) == 0){
                $array = District::all()->lists('district','id');
            }else{
                foreach ($district as $sec){
                    $array[$sec] = District::find($sec)->district;
                }
            }
            $columnss = "district";
            $tabletitle = "Districts";

        }
        $k =0;
        $category1 = "";
        $column1 = "";
        $pie1 = "";
        foreach($array as $key=>$value){
            $k++;
            if($condition == "all"){
                if($operate == "sector"){
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."},";
                }else{
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->get()):count(NGOs::where($columnss,$key)->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."},";
                }
            }else{
                if($operate == "sector"){
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."},";
                }else{
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()):count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."},";
                }

            }
        }

            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        title: {
                            text: '<?php echo $title ?>'
                        },
                        xAxis: {
                            categories: [<?php echo $category1 ?>]
                        },
                        labels: {
                            items: [{
                                html: '<?php echo $title ?>',
                                style: {
                                    left: '150px',
                                    top: '0px',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                                }
                            }]
                        },
                        series: [{
                            type: 'line',
                            data: [<?php echo $column1 ?>]
                        }
                        ]
                    });
                });
            </script>
        <?php
    }

    public function combined($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
        if($operate == "sector"){
            if(count($sector) == 0){
                $array = Sector::all()->lists('sector_name','id');
            }else{
                foreach ($sector as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "priority_sector";
            $tabletitle = "Priority Sector";

        }
        elseif($operate == "level"){
            if(count($operation) == 0){
                $array = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
            }else{
                foreach ($operation as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "operation_level";
            $tabletitle = "Operation Level";

        }
        elseif($operate == "Regions"){
            if(count($region) == 0 ){
                $array = Region::all()->lists('region','id');
            }else{
                foreach ($region as $sec){
                    $array[$sec] = Region::find($sec)->region;
                }
            }
            $columnss = "region";
            $tabletitle = "Region";

        }
        elseif($operate == "Districts"){
            if(count($district) == 0){
                $array = District::all()->lists('district','id');
            }else{
                foreach ($district as $sec){
                    $array[$sec] = District::find($sec)->district;
                }
            }
            $columnss = "district";
            $tabletitle = "Districts";

        }
        $k =0;
        $category1 = "";
        $column1 = "";
        $pie1 = "";
        foreach($array as $key=>$value){
            $k++;
            if($condition == "all"){
                if($operate == "sector"){
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."},";
                }else{
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->get()):count(NGOs::where($columnss,$key)->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."},";
                }
            }else{
                if($operate == "sector"){
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()):count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."},";
                }else{
                    $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()):count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()).",";
                    $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."},";
                }

            }
        }
            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        title: {
                            text: '<?php  echo $title ?>'
                        },
                        xAxis: {
                            categories: [<?php echo $category1 ?>]
                        },
                        labels: {
                            items: [{
                                html: '<?php  echo $title ?>',
                                style: {
                                    left: '150px',
                                    top: '0px',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                                }
                            }]
                        },
                        series: [{
                            type: 'column',
                            data: [<?php echo $column1 ?>]
                        }, {
                            type: 'spline',
                            name: 'Average',
                            data: [<?php echo $column1 ?>],
                            marker: {
                                lineWidth: 2,
                                lineColor: Highcharts.getOptions().colors[3],
                                fillColor: 'white'
                            }
                        }, {
                            type: 'pie',
                            name: 'NGOs',
                            data: [<?php echo $pie1 ?>],
                            center: [50, 20],
                            size: 120,
                            showInLegend: false,
                            dataLabels: {
                                enabled: false
                            }
                        }]
                    });
                });
            </script>
        <?php


    }
public function pie($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
        if($operate == "sector"){
            if(count($sector) == 0){
                $array = Sector::all()->lists('sector_name','id');
            }else{
                foreach ($sector as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "priority_sector";
            $tabletitle = "Priority Sector";

        }
        elseif($operate == "level"){
            if(count($operation) == 0){
                $array = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
            }else{
                foreach ($operation as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "operation_level";
            $tabletitle = "Operation Level";

        }
        elseif($operate == "Regions"){
            if(count($region) == 0 ){
                $array = Region::all()->lists('region','id');
            }else{
                foreach ($region as $sec){
                    $array[$sec] = Region::find($sec)->region;
                }
            }
            $columnss = "region";
            $tabletitle = "Region";

        }
        elseif($operate == "Districts"){
            if(count($district) == 0){
                $array = District::all()->lists('district','id');
            }else{
                foreach ($district as $sec){
                    $array[$sec] = District::find($sec)->district;
                }
            }
            $columnss = "district";
            $tabletitle = "Districts";

        }
        $k =0;
        $category1 = "";
        $column1 = "";
        $pie1 = "";
        foreach($array as $key=>$value){
            $k++;
            if($condition == "all"){
                if($operate == "sector")
                    $pie1 .= (count($array) == $k)?"['".$value."', ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0)))."]":"['".$value."', ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->get())."],";
                else
                    $pie1 .= (count($array) == $k)?"['".$value."', ".count(NGOs::where($columnss,$key)->get())."]":"['".$value."', ".count(NGOs::where($columnss,$key)->get())."],";
            }else{
                if($operate == "sector")
                    $pie1 .= (count($array) == $k)?"['".$value."', ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."]":"['".$value."', ".count(NGOs::whereIn('id',NGOSector::where('sector_id',$key)->get()->lists('n_gos_id')+array(0))->where('registation_type',$condition)->get())."],";
                else
                    $pie1 .= (count($array) == $k)?"['".$value."', ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."]":"['".$value."', ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."],";

            }

        }
            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: '<?php echo $title ?>'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'NGOs',
                            data: [
                                <?php echo $pie1 ?>
                            ]
                        }]
                    });
                });
            </script>
        <?php


    }

    /**
     * a function to export data to excel
     */
    public function excelDownload1($ngo,$region,$district,$sector,$operation,$title,$operate,$condition){
        $array = array();
        $columnss = "";
        $tabletitle = "";
        if($operate == "sector"){
            if(count($sector) == 0){
                $array = Sector::all()->lists('sector_name','id');
            }else{
                foreach ($sector as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "priority_sector";
            $tabletitle = "Priority Sector";

        }
        elseif($operate == "level"){
            if(count($operation) == 0){
                $array = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
            }else{
                foreach ($operation as $sec){
                    $array[$sec] = $sec;
                }
            }
            $columnss = "operation_level";
            $tabletitle = "Operation Level";

        }
        elseif($operate == "Regions"){
            if(count($region) == 0 ){
                $array = Region::all()->lists('region','id');
            }else{
                foreach ($region as $sec){
                    $array[$sec] = Region::find($sec)->region;
                }
            }
            $columnss = "region";
            $tabletitle = "Region";

        }
        elseif($operate == "Districts"){
            if(count($district) == 0){
                $array = District::all()->lists('district','id');
            }else{
                foreach ($district as $sec){
                    $array[$sec] = District::find($sec)->district;
                }
            }
            $columnss = "district";
            $tabletitle = "Districts";

        }
        $k =0;
        $category1 = "";
        $column1 = "";
        $pie1 = "";
        foreach($array as $key=>$value){
            $k++;
            if($condition == "all"){
                $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->get()):count(NGOs::where($columnss,$key)->get()).",";
                $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->get())."},";
            }else{
                $category1 .= (count($array) == $k)?"'$value'":"'$value',";
                $column1 .= (count($array) == $k)?count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()):count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get()).",";
                $pie1 .= (count($array) == $k)?"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where($columnss,$key)->where('registation_type',$condition)->get())."},";
            }
        }
        require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();


        // Set document properties
        $objPHPExcel->getProperties()->setCreator("NGOs Management System")
            ->setLastModifiedBy("User")
            ->setTitle("NGOS")
            ->setSubject("NGOs")
            ->setDescription("NGOs Management System")
            ->setKeywords("NGO php")
            ->setCategory("Result file");


        $ttlecont = 1;
        foreach($array as $key => $header){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A{$ttlecont}", $header)
                ->setCellValue("B{$ttlecont}", count(NGOs::where($columnss,$key)->get()));
            $ttlecont++;
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle("NGOS");


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="records.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }


    public function financial(){
        return View::make('statistics.financial');
    }
}
