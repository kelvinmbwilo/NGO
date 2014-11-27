<?php

?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
NGOs
                <button class="btn btn-primary btn-xs pull-left add" id="add"><i class="fa fa-plus"></i> Add</button>
                </div>
        </div>
        <div class="bootstrap-admin-panel-content ">

        <div role="tabpanel">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist" id="ngos_tabs">
            <li role="presentation" class="active"><a href="#ngos" aria-controls="ngos" role="tab" data-toggle="tab">All NGOs</a></li>
            <li role="presentation"><a href="#multsectors" aria-controls="multsectors" role="tab" data-toggle="tab">Mult Sectors NGOs</a></li>
            <li role="presentation"><a href="#singlesectors" aria-controls="singlesectors" role="tab" data-toggle="tab">Single Sector NGOs</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
                   <div role="tabpanel" class="tab-pane active data_ngo_all" id="ngos">

                   <div class="col-md-6 col-md-offset-3"></br>
                                          </br></br>
                                          </br></br>
                  </br><span style="font-weight: bolder;font-size: 14px;"><i class="fa fa-spinner fa-spin fa-3x"></i>&nbsp;data loading please wait ...</span>
                  </div>

                  </div>
                   <div role="tabpanel" class="tab-pane data_ngo_mult" id="multsectors">

                    <div class="col-md-6 col-md-offset-3"></br>
                                           </br></br>
                                           </br></br>
                   </br><span style="font-weight: bolder;font-size: 14px;"><i class="fa fa-spinner fa-spin fa-3x"></i>&nbsp;data loading please wait ...</span>
                   </div>

                   </div>
                   <div role="tabpanel" class="tab-pane data_ngo_single" id="singlesectors">

                                <div class="col-md-6 col-md-offset-3"></br>
                                                       </br></br>
                                                       </br></br>
                               </br><span style="font-weight: bolder;font-size: 14px;"><i class="fa fa-spinner fa-spin fa-3x"></i>&nbsp;data loading please wait ...</span>
                               </div>

                   </div>

          </div>

        </div>


        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $("ul#ngos_tabs li:first a").on("click",function(){
        $("div.active").removeClass("active");
        $("div#ngos").addClass("active");
    });


        $.ajax({
            url: "<?php echo url("ngoJsonAll") ?>",
            context: document.body
        }).done(function(data) {

            var ngoDataTable = '<table class="table table-striped table-bordered" id="example2_ngo_all">';
                ngoDataTable += '<thead>';
                ngoDataTable += '<tr>';
                ngoDataTable += '<th> SN </th>';
                ngoDataTable += '<th> Name </th>';
                ngoDataTable += '<th> Registration No </th>';
                ngoDataTable += '<th> Registration Date </th>';
                ngoDataTable += '<th> Registration Type </th>';
                ngoDataTable += '<th> Level Of Operation</th>';
                ngoDataTable += '<th> Action </th>';
                ngoDataTable += '</tr>';
                ngoDataTable += '</thead>';
                ngoDataTable += '<tbody>';
                var  rowCounter = 1;
            $.each(data,function(index,val){
                ngoDataTable += '<tr>';
                ngoDataTable += '<td>'+rowCounter+'</td>';
                ngoDataTable += '<td style="text-transform: capitalize">'+val["name"]+'</td>';
                ngoDataTable += '<td>'+val["certificate_no"]+'</td>';
                ngoDataTable += '<td>'+val["registation_date"]+'</td>';
                ngoDataTable += '<td>'+val["registation_type"]+'</td>';
                ngoDataTable += '<td>'+val["operation_level"]+'</td>';
                ngoDataTable += '<td class="action_group" id="'+val["id"]+'">';
                ngoDataTable += '<a href="prioritysectors" title="View Priority Sectors" class="prioritysectors"><i class="fa fa-list text-success"></i> Priority Sectors</a>&nbsp;&nbsp;&nbsp';
                ngoDataTable += '<a href="member" title="View Members" ><i class="fa fa-list text-success"></i> Members</a>&nbsp;&nbsp;&nbsp';
                ngoDataTable += '<a href="bearer" title="View Employee" ><i class="fa fa-th-large text-warning"></i> Employee</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="report" title="View Report" ><i class="fa fa-briefcase text-primary"></i> Reports</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="#edit" title="edit NGO" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;';
                ngoDataTable += '<a href="summary" title="View NGO Summary" class="summary"><i class="fa fa-user text-info"></i> Summary</a>&nbsp;&nbsp;';
                ngoDataTable += '<a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>';
                ngoDataTable += '</td>';
                ngoDataTable += '</tr>';
                rowCounter++;
            });
            ngoDataTable += '</tbody>';
            ngoDataTable += '</table>';
            $(".data_ngo_all").html(ngoDataTable);
                $('#example2_ngo_all').dataTable({
                    "fnDrawCallback": function( oSettings ) {
                        //redirect to links
                        $("td.action_group a").on("click",function(e){
                            e.preventDefault();
                            var recordId = $(this).parent("td").attr("id");
                            var page = $(this).attr("href");

                            if(page!="#edit" && page!="#b"){
                                window.location.replace('{{ url("ngo/'+recordId+'/'+page+'") }}');
                            }

                        });
                        //editing a room
                        $(".edituser").click(function(){
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

                        //editing a room
                        $(".summary").click(function(){
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

                        //adding a NGO
                        $(".add").click(function(){
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
                            $(".modal-body").load("<?php echo url("ngo/add") ?>/");
                            $("#myModal").on('hidden.bs.modal',function(){
                                $("#myModal").remove();
                            })
                        })


                        //display user log
                        $(".userlog").click(function(){
                            var id = $(this).parent().attr('id');
                            var id1 = $(this).parent().attr('id');
                            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                            modal+= '<div class="modal-dialog">';
                            modal+= '<div class="modal-content">';
                            modal+= '<div class="modal-header">';
                            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                            modal+= '<h2 class="modal-title" id="myModalLabel">System Usage Log</h2>';
                            modal+= '</div>';
                            modal+= '<div class="modal-body">';
                            modal+= ' </div>';
                            modal+= '</div>';
                            modal+= '</div>';

                            $("body").append(modal);
                            $("#myModal").modal("show");
                            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                            $(".modal-body").load("<?php echo url("user/log") ?>/"+id1);
                            $("#myModal").on('hidden.bs.modal',function(){
                                $("#myModal").remove();
                            })
                        })

                        $(".deleteuser").click(function(){
                           var id1 = $(this).parent().attr('id');
                            $(".deleteuser").show("slow").parent().parent().find("span").remove();
                            var btn = $(this).parent().parent();
                            $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                            $("#no").click(function(){
                                $(this).parent().parent().find(".deleteuser").show("slow");
                                $(this).parent().parent().find("span").remove();
                            });
                            $("#yes").click(function(){
                                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                                $.post("<?php echo url('ngo/delete') ?>/"+id1,function(data){
                                    btn.hide("slow").next("hr").hide("slow");
                                });
                                btn.hide("slow").next("hr").hide("slow");
                            });
                        });//endof deleting category
                        $(".prioritysectors").click(function(e){
                                  e.preventDefault();
                                  var id1 = $(this).parent().attr('id');
                                        $(".data_ngo").load("<?php echo url("ngo/prioritysector") ?>/"+id1);
                        });//endof deleting category
                    }
                });
        });



    /// multiple sectors ngo
    $.ajax({
                url: "<?php echo url("ngoJsonMult") ?>",
                context: document.body
            }).done(function(data) {

                var ngoDataTable = '<table class="table table-striped table-bordered" id="example2_mult">';
                    ngoDataTable += '<thead>';
                    ngoDataTable += '<tr>';
                    ngoDataTable += '<th> SN </th>';
                    ngoDataTable += '<th> Name </th>';
                    ngoDataTable += '<th> Registration No </th>';
                    ngoDataTable += '<th> Registration Date </th>';
                    ngoDataTable += '<th> Registration Type </th>';
                    ngoDataTable += '<th> Level Of Operation</th>';
                    ngoDataTable += '<th> Action </th>';
                    ngoDataTable += '</tr>';
                    ngoDataTable += '</thead>';
                    ngoDataTable += '<tbody>';
                    var  rowCounter = 1;
                $.each(data,function(index,val){
                    ngoDataTable += '<tr>';
                    ngoDataTable += '<td>'+rowCounter+'</td>';
                    ngoDataTable += '<td style="text-transform: capitalize">'+val["name"]+'</td>';
                    ngoDataTable += '<td>'+val["certificate_no"]+'</td>';
                    ngoDataTable += '<td>'+val["registation_date"]+'</td>';
                    ngoDataTable += '<td>'+val["registation_type"]+'</td>';
                    ngoDataTable += '<td>'+val["operation_level"]+'</td>';
                    ngoDataTable += '<td class="action_group" id="'+val["id"]+'">';
                    ngoDataTable += '<a href="prioritysectors" title="View Priority Sectors" class="prioritysectors"><i class="fa fa-list text-success"></i> Priority Sectors</a>&nbsp;&nbsp;&nbsp';
                    ngoDataTable += '<a href="member" title="View Members" ><i class="fa fa-list text-success"></i> Members</a>&nbsp;&nbsp;&nbsp';
                    ngoDataTable += '<a href="bearer" title="View Employee" ><i class="fa fa-th-large text-warning"></i> Employee</a>&nbsp;&nbsp;&nbsp;';
                    ngoDataTable += '<a href="report" title="View Report" ><i class="fa fa-briefcase text-primary"></i> Reports</a>&nbsp;&nbsp;&nbsp;';
                    ngoDataTable += '<a href="#edit" title="edit NGO" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;';
                    ngoDataTable += '<a href="summary" title="View NGO Summary" class="summary"><i class="fa fa-user text-info"></i> Summary</a>&nbsp;&nbsp;';
                    ngoDataTable += '<a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>';
                    ngoDataTable += '</td>';
                    ngoDataTable += '</tr>';
                    rowCounter++;
                });
                ngoDataTable += '</tbody>';
                ngoDataTable += '</table>';
                $(".data_ngo_mult").html(ngoDataTable);
                    $('#example2_ngo_mult').dataTable({
                        "fnDrawCallback": function( oSettings ) {
                            //redirect to links
                            $("td.action_group a").on("click",function(e){
                                e.preventDefault();
                                var recordId = $(this).parent("td").attr("id");
                                var page = $(this).attr("href");

                                if(page!="#edit" && page!="#b"){
                                    window.location.replace('{{ url("ngo/'+recordId+'/'+page+'") }}');
                                }

                            });
                            //editing a room
                            $(".edituser").click(function(){
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

                            //editing a room
                            $(".summary").click(function(){
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

                            //adding a NGO
                            $(".add").click(function(){
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
                                $(".modal-body").load("<?php echo url("ngo/add") ?>/");
                                $("#myModal").on('hidden.bs.modal',function(){
                                    $("#myModal").remove();
                                })
                            })


                            //display user log
                            $(".userlog").click(function(){
                                var id = $(this).parent().attr('id');
                                var id1 = $(this).parent().attr('id');
                                var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                                modal+= '<div class="modal-dialog">';
                                modal+= '<div class="modal-content">';
                                modal+= '<div class="modal-header">';
                                modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                                modal+= '<h2 class="modal-title" id="myModalLabel">System Usage Log</h2>';
                                modal+= '</div>';
                                modal+= '<div class="modal-body">';
                                modal+= ' </div>';
                                modal+= '</div>';
                                modal+= '</div>';

                                $("body").append(modal);
                                $("#myModal").modal("show");
                                $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                                $(".modal-body").load("<?php echo url("user/log") ?>/"+id1);
                                $("#myModal").on('hidden.bs.modal',function(){
                                    $("#myModal").remove();
                                })
                            })

                            $(".deleteuser").click(function(){
                               var id1 = $(this).parent().attr('id');
                                $(".deleteuser").show("slow").parent().parent().find("span").remove();
                                var btn = $(this).parent().parent();
                                $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                                $("#no").click(function(){
                                    $(this).parent().parent().find(".deleteuser").show("slow");
                                    $(this).parent().parent().find("span").remove();
                                });
                                $("#yes").click(function(){
                                    $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                                    $.post("<?php echo url('ngo/delete') ?>/"+id1,function(data){
                                        btn.hide("slow").next("hr").hide("slow");
                                    });
                                    btn.hide("slow").next("hr").hide("slow");
                                });
                            });//endof deleting category
                            $(".prioritysectors").click(function(e){
                                      e.preventDefault();
                                      var id1 = $(this).parent().attr('id');
                                            $(".data_ngo").load("<?php echo url("ngo/prioritysector") ?>/"+id1);
                            });//endof deleting category
                        }
                    });
            });


//single sectors ngos

$.ajax({
            url: "<?php echo url("ngoJsonSingle") ?>",
            context: document.body
        }).done(function(data) {

            var ngoDataTable = '<table class="table table-striped table-bordered" id="example2_single">';
                ngoDataTable += '<thead>';
                ngoDataTable += '<tr>';
                ngoDataTable += '<th> SN </th>';
                ngoDataTable += '<th> Name </th>';
                ngoDataTable += '<th> Registration No </th>';
                ngoDataTable += '<th> Registration Date </th>';
                ngoDataTable += '<th> Registration Type </th>';
                ngoDataTable += '<th> Level Of Operation</th>';
                ngoDataTable += '<th> Action </th>';
                ngoDataTable += '</tr>';
                ngoDataTable += '</thead>';
                ngoDataTable += '<tbody>';
                var  rowCounter = 1;
            $.each(data,function(index,val){
                ngoDataTable += '<tr>';
                ngoDataTable += '<td>'+rowCounter+'</td>';
                ngoDataTable += '<td style="text-transform: capitalize">'+val["name"]+'</td>';
                ngoDataTable += '<td>'+val["certificate_no"]+'</td>';
                ngoDataTable += '<td>'+val["registation_date"]+'</td>';
                ngoDataTable += '<td>'+val["registation_type"]+'</td>';
                ngoDataTable += '<td>'+val["operation_level"]+'</td>';
                ngoDataTable += '<td class="action_group" id="'+val["id"]+'">';
                ngoDataTable += '<a href="prioritysectors" title="View Priority Sectors" class="prioritysectors"><i class="fa fa-list text-success"></i> Priority Sectors</a>&nbsp;&nbsp;&nbsp';
                ngoDataTable += '<a href="member" title="View Members" ><i class="fa fa-list text-success"></i> Members</a>&nbsp;&nbsp;&nbsp';
                ngoDataTable += '<a href="bearer" title="View Employee" ><i class="fa fa-th-large text-warning"></i> Employee</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="report" title="View Report" ><i class="fa fa-briefcase text-primary"></i> Reports</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="#edit" title="edit NGO" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;';
                ngoDataTable += '<a href="summary" title="View NGO Summary" class="summary"><i class="fa fa-user text-info"></i> Summary</a>&nbsp;&nbsp;';
                ngoDataTable += '<a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>';
                ngoDataTable += '</td>';
                ngoDataTable += '</tr>';
                rowCounter++;
            });
            ngoDataTable += '</tbody>';
            ngoDataTable += '</table>';
            $(".data_ngo_single").html(ngoDataTable);
                $('#example2_single').dataTable({
                    "fnDrawCallback": function( oSettings ) {
                        //redirect to links
                        $("td.action_group a").on("click",function(e){
                            e.preventDefault();
                            var recordId = $(this).parent("td").attr("id");
                            var page = $(this).attr("href");

                            if(page!="#edit" && page!="#b"){
                                window.location.replace('{{ url("ngo/'+recordId+'/'+page+'") }}');
                            }

                        });
                        //editing a room
                        $(".edituser").click(function(){
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

                        //editing a room
                        $(".summary").click(function(){
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

                        //adding a NGO
                        $(".add").click(function(){
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
                            $(".modal-body").load("<?php echo url("ngo/add") ?>/");
                            $("#myModal").on('hidden.bs.modal',function(){
                                $("#myModal").remove();
                            })
                        })


                        //display user log
                        $(".userlog").click(function(){
                            var id = $(this).parent().attr('id');
                            var id1 = $(this).parent().attr('id');
                            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                            modal+= '<div class="modal-dialog">';
                            modal+= '<div class="modal-content">';
                            modal+= '<div class="modal-header">';
                            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                            modal+= '<h2 class="modal-title" id="myModalLabel">System Usage Log</h2>';
                            modal+= '</div>';
                            modal+= '<div class="modal-body">';
                            modal+= ' </div>';
                            modal+= '</div>';
                            modal+= '</div>';

                            $("body").append(modal);
                            $("#myModal").modal("show");
                            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                            $(".modal-body").load("<?php echo url("user/log") ?>/"+id1);
                            $("#myModal").on('hidden.bs.modal',function(){
                                $("#myModal").remove();
                            })
                        })

                        $(".deleteuser").click(function(){
                           var id1 = $(this).parent().attr('id');
                            $(".deleteuser").show("slow").parent().parent().find("span").remove();
                            var btn = $(this).parent().parent();
                            $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                            $("#no").click(function(){
                                $(this).parent().parent().find(".deleteuser").show("slow");
                                $(this).parent().parent().find("span").remove();
                            });
                            $("#yes").click(function(){
                                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                                $.post("<?php echo url('ngo/delete') ?>/"+id1,function(data){
                                    btn.hide("slow").next("hr").hide("slow");
                                });
                                btn.hide("slow").next("hr").hide("slow");
                            });
                        });//endof deleting category
                        $(".prioritysectors").click(function(e){
                                  e.preventDefault();
                                  var id1 = $(this).parent().attr('id');
                                        $(".data_ngo").load("<?php echo url("ngo/prioritysector") ?>/"+id1);
                        });//endof deleting category
                    }
                });
        });


});
</script>