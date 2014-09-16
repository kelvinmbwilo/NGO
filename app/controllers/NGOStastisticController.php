<?php

class NGOStastisticController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$condition = "";
        $ngo = NGOs::all();

        $operate = Input::get('operate');
        $chart = Input::get('chart');
        echo $operate.$chart;
//        if(count(Input::get('region')) != 0){
//            $ngo->whereIn('region',Input::get('region'));
//        }
//        if(count(Input::get('district')) != 0){
//            $ngo->whereIn('district',Input::get('district'));
//        }
//        if(count(Input::get('sector')) != 0){
//            $ngo->whereIn('priority_sector',Input::get('sector'));
//        }
//        if(count(Input::get('operation')) != 0){
//            $ngo->whereIn('operation_level',Input::get('operation'));
//        }

        if($chart =="records"){
            $this->records($ngo);
        }elseif($chart =="bar"){
            $this->bar($ngo,$operate);
        }elseif($chart =="table"){
            $this->records($ngo);
        }elseif($chart == "line"){
            $this->line($ngo,$operate);
        }elseif($chart == "combined"){
            $this->combined($ngo,$operate);
        }

	}


	public function records($ngo){
        ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
NGOs
                <button class="btn btn-primary btn-xs pull-left add" id="add"><i class="fa fa-plus"></i> add</button>
            </div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <?php if($ngo->count() == 0){ ?>
            <h3>There are no NGOs registered to the system</h3>
<?php }else{ ?>
            <table class="table table-striped table-bordered" id="example2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Registration Date </th>
                    <th> Registration Type </th>
                    <th> Region</th>
                    <th> District</th>
                    <th> Priority Sector</th>
                    <th> Phone Number</th>
                    <th> Email</th>
                    <th> Postal Address</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
<?php foreach($ngo as $us){ ?>
<tr>
    <td><?php echo $i++ ?></td>
    <td style="text-transform: capitalize"><?php echo $us->name ?></td>
    <td><?php echo $us->registation_date ?></td>
    <td><?php echo $us->registation_type ?></td>
    <td><?php echo Region::find($us->region)->region ?></td>
    <td><?php echo District::find($us->district)->district ?></td>
    <td><?php echo $us->priority_sector ?></td>
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

    public function bar($ngo,$operate){
if($operate == "sector"){
    $sector = array(
        "Agriculture and Food Security"=>"Agriculture and Food Security",
        "Education and Training"=>"Education and Training",
        "Health and HIV/AIDS"=>"Health and HIV/AIDS",
        "Tourism and Wildlife"=>"Tourism and Wildlife",
        "Social Security and Social Protection"=>"Social Security and Social Protection",
        "Legal and Human Rights"=>"Legal and Human Rights",
        "Good Governance"=>"Good Governance",
        "Gender and Women Empowerment"=>"Gender and Women Empowerment",
        "Water and Sanitation"=>"Water and Sanitation",
        "Environment and Climate Change"=>"Environment and Climate Change",
        "Labor and Employment"=>"Labor and Employment",
        "Finance"=>"Finance",
        " Mineral and Energy "=>"Mineral and Energy ",
        "Sports and Culture"=>"Sports and Culture",
        "Transport and Infrastructure"=>"Transport and Infrastructure",
    );
    $i =0;
    $category = "";
    $column = "";
    $pie = "";
    foreach($sector as $value){
        $i++;
        $category .= (count($sector) == $i)?"'$value'":"'$value',";
        $column .= (count($sector) == $i)?count(NGOs::where('priority_sector',$value)->get()):count(NGOs::where('priority_sector',$value)->get()).",";
        $pie .= (count($sector) == $i)?"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."},";

    }
    ?>
    <script>
        $(function () {
            $('#visits').highcharts({
                title: {
                    text: 'NGO Sectoral Distribution'
                },
                xAxis: {
                    categories: [<?php echo $category ?>]
                },
                labels: {
                    items: [{
                        html: 'NGO Sectoral Distribution',
                        style: {
                            left: '150px',
                            top: '0px',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                        }
                    }]
                },
                series: [{
                    type: 'column',
                    data: [<?php echo $column ?>]

                }]
            });

        });
    </script>
<?php
}elseif($operate == 'level'){

                $operation = array(
                    'International'=>'International',
                    'National'=>'National',
                    'Regional'=>'Regional',
                    'District'=>'District'
                );
                $k =0;
                $category1 = "";
                $column1 = "";
                $pie1 = "";
                foreach($operation as $value){
                    $k++;
                    $category1 .= (count($operation) == $k)?"'$value'":"'$value',";
                    $column1 .= (count($operation) == $k)?count(NGOs::where('operation_level',$value)->get()):count(NGOs::where('operation_level',$value)->get()).",";
                    $pie1 .= (count($operation) == $k)?"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."},";

                }
        ?>
        <script>
            $(function () {
               $('#visits').highcharts({
                    title: {
                        text: 'NGO Operational Areas'
                    },
                    xAxis: {
                        categories: [<?php echo $category1 ?>]
                    },
                    labels: {
                        items: [{
                            html: 'NGO Operational Areas',
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
}

    public function line($ngo,$operate){
        if($operate == "sector"){
            $sector = array(
                "Agriculture and Food Security"=>"Agriculture and Food Security",
                "Education and Training"=>"Education and Training",
                "Health and HIV/AIDS"=>"Health and HIV/AIDS",
                "Tourism and Wildlife"=>"Tourism and Wildlife",
                "Social Security and Social Protection"=>"Social Security and Social Protection",
                "Legal and Human Rights"=>"Legal and Human Rights",
                "Good Governance"=>"Good Governance",
                "Gender and Women Empowerment"=>"Gender and Women Empowerment",
                "Water and Sanitation"=>"Water and Sanitation",
                "Environment and Climate Change"=>"Environment and Climate Change",
                "Labor and Employment"=>"Labor and Employment",
                "Finance"=>"Finance",
                " Mineral and Energy "=>"Mineral and Energy ",
                "Sports and Culture"=>"Sports and Culture",
                "Transport and Infrastructure"=>"Transport and Infrastructure",
            );
            $i =0;
            $category = "";
            $column = "";
            $pie = "";
            foreach($sector as $value){
                $i++;
                $category .= (count($sector) == $i)?"'$value'":"'$value',";
                $column .= (count($sector) == $i)?count(NGOs::where('priority_sector',$value)->get()):count(NGOs::where('priority_sector',$value)->get()).",";
                $pie .= (count($sector) == $i)?"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."},";

            }
            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        title: {
                            text: 'NGO Sectoral Distribution'
                        },
                        xAxis: {
                            categories: [<?php echo $category ?>]
                        },
                        labels: {
                            items: [{
                                html: 'NGO Sectoral Distribution',
                                style: {
                                    left: '150px',
                                    top: '0px',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                                }
                            }]
                        },
                        series: [{
                            type: 'line',
                            data: [<?php echo $column ?>]

                        }]
                    });

                });
            </script>
        <?php
        }elseif($operate == 'level'){

            $operation = array(
                'International'=>'International',
                'National'=>'National',
                'Regional'=>'Regional',
                'District'=>'District'
            );
            $k =0;
            $category1 = "";
            $column1 = "";
            $pie1 = "";
            foreach($operation as $value){
                $k++;
                $category1 .= (count($operation) == $k)?"'$value'":"'$value',";
                $column1 .= (count($operation) == $k)?count(NGOs::where('operation_level',$value)->get()):count(NGOs::where('operation_level',$value)->get()).",";
                $pie1 .= (count($operation) == $k)?"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."},";

            }
            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        title: {
                            text: 'NGO Operational Areas'
                        },
                        xAxis: {
                            categories: [<?php echo $category1 ?>]
                        },
                        labels: {
                            items: [{
                                html: 'NGO Operational Areas',
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
    }

    public function combined($ngo,$operate){
        if($operate == "sector"){
        $sector = array(
            "Agriculture and Food Security"=>"Agriculture and Food Security",
            "Education and Training"=>"Education and Training",
            "Health and HIV/AIDS"=>"Health and HIV/AIDS",
            "Tourism and Wildlife"=>"Tourism and Wildlife",
            "Social Security and Social Protection"=>"Social Security and Social Protection",
            "Legal and Human Rights"=>"Legal and Human Rights",
            "Good Governance"=>"Good Governance",
            "Gender and Women Empowerment"=>"Gender and Women Empowerment",
            "Water and Sanitation"=>"Water and Sanitation",
            "Environment and Climate Change"=>"Environment and Climate Change",
            "Labor and Employment"=>"Labor and Employment",
            "Finance"=>"Finance",
            " Mineral and Energy "=>"Mineral and Energy ",
            "Sports and Culture"=>"Sports and Culture",
            "Transport and Infrastructure"=>"Transport and Infrastructure",
        );
        $i =0;
        $category = "";
        $column = "";
        $pie = "";
        foreach($sector as $value){
            $i++;
            $category .= (count($sector) == $i)?"'$value'":"'$value',";
            $column .= (count($sector) == $i)?count(NGOs::where('priority_sector',$value)->get()):count(NGOs::where('priority_sector',$value)->get()).",";
            $pie .= (count($sector) == $i)?"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('priority_sector',$value)->get())."},";

        }
            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        title: {
                            text: 'NGO Sectoral Distribution'
                        },
                        xAxis: {
                            categories: [<?php echo $category ?>]
                        },
                        labels: {
                            items: [{
                                html: 'NGO Sectoral Distribution',
                                style: {
                                    left: '150px',
                                    top: '0px',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                                }
                            }]
                        },
                        series: [{
                            type: 'column',
                            data: [<?php echo $column ?>]
                        }, {
                            type: 'spline',
                            name: 'Average',
                            data: [<?php echo $column ?>],
                            marker: {
                                lineWidth: 2,
                                lineColor: Highcharts.getOptions().colors[3],
                                fillColor: 'white'
                            }
                        }, {
                            type: 'pie',
                            name: 'NGOs',
                            data: [<?php echo $pie ?>],
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
        }elseif($operate == "level"){
        $operation = array(
            'International'=>'International',
            'National'=>'National',
            'Regional'=>'Regional',
            'District'=>'District'
        );
        $k =0;
        $category1 = "";
        $column1 = "";
        $pie1 = "";
        foreach($operation as $value){
            $k++;
            $category1 .= (count($operation) == $k)?"'$value'":"'$value',";
            $column1 .= (count($operation) == $k)?count(NGOs::where('operation_level',$value)->get()):count(NGOs::where('operation_level',$value)->get()).",";
            $pie1 .= (count($operation) == $k)?"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."}":"{ name:'".$value."',y: ".count(NGOs::where('operation_level',$value)->get())."},";

        }
            ?>
            <script>
                $(function () {
                    $('#visits').highcharts({
                        title: {
                            text: 'NGO Operational Areas'
                        },
                        xAxis: {
                            categories: [<?php echo $category1 ?>]
                        },
                        labels: {
                            items: [{
                                html: 'NGO Operational Areas',
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

    }
}
