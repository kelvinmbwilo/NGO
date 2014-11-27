<?php

?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
Sectors
                <button class="btn btn-primary btn-xs pull-left add_sector" id="add_sector"><i class="fa fa-plus"></i> Add</button>
                </div>
        </div>
        <div class="bootstrap-admin-panel-content data_sector">

            <div class="col-md-6 col-md-offset-3"></br>
                </br></br>
                </br></br>
                </br><span style="font-weight: bolder;font-size: 14px;"><i class="fa fa-spinner fa-spin fa-3x"></i>&nbsp;data loading please wait ...</span>
            </div>
        </div>
    </div>
</div>


<!--script to process the list of users-->
<script>
    /* Table initialisation */
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo url("sectorJson") ?>",
            context: document.body
        }).done(function(data) {

            var sectorDataTable = '<table class="table table-striped table-bordered" id="sector">';
                sectorDataTable += '<thead>';
                sectorDataTable += '<tr>';
                sectorDataTable += '<th> SN </th>';
                sectorDataTable += '<th>Sector Name </th>';
                sectorDataTable += '<th> Action </th>';
                sectorDataTable += '</tr>';
                sectorDataTable += '</thead>';
                sectorDataTable += '<tbody>';
                var  rowCounter = 1;
            $.each(data,function(index,val){
                sectorDataTable += '<tr>';
                sectorDataTable += '<td>'+rowCounter+'</td>';
                sectorDataTable += '<td style="text-transform: capitalize">'+val.sector_name+'</td>';
                sectorDataTable += '<td class="action_group" id="'+val["id"]+'">';
                sectorDataTable += '<a href="#edit" title="edit sector" class="editector"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;';
                sectorDataTable += '<a href="#b" title="delete sector" class="deletesector"><i class="fa fa-trash-o text-danger"></i> </a>';
                sectorDataTable += '</td>';
                sectorDataTable += '</tr>';
                rowCounter++;
            });
            sectorDataTable += '</tbody>';
            sectorDataTable += '</table>';
            $(".data_sector").html(sectorDataTable);
                $('#sector').dataTable({
                    "fnDrawCallback": function( oSettings ) {

                        $(".add_sector").click(function(){

                            var id1 = $(this).parent().attr('id');
                            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                            modal+= '<div class="modal-dialog">';
                            modal+= '<div class="modal-content">';
                            modal+= '<div class="modal-header">';
                            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                            modal+= '<h2 class="modal-title" id="myModalLabel">Add Sectors</h2>';
                            modal+= '</div>';
                            modal+= '<div class="modal-body">';
                            modal+= ' </div>';
                            modal+= '</div>';
                            modal+= '</div>';

                            $("body").append(modal);
                            $("#myModal").modal("show");
                            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                            $(".modal-body").load("<?php echo url("addSector") ?>/");
                            $("#myModal").on('hidden.bs.modal',function(){
                                $("#myModal").remove();
                            })
                        })

                           //editing a room
                           $(".editector").click(function(){
                               var id1 = $(this).parent().attr('id');
                               var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                               modal+= '<div class="modal-dialog">';
                               modal+= '<div class="modal-content">';
                               modal+= '<div class="modal-header">';
                               modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                               modal+= '<h2 class="modal-title" id="myModalLabel">Update Sector</h2>';
                               modal+= '</div>';
                               modal+= '<div class="modal-body">';
                               modal+= ' </div>';
                               modal+= '</div>';
                               modal+= '</div>';

                               $("body").append(modal);
                               $("#myModal").modal("show");
                               $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                               $(".modal-body").load("<?php echo url("sector/edit") ?>/"+id1);
                               $("#myModal").on('hidden.bs.modal',function(){
                                   $("#myModal").remove();
                               })
                           })


                            $(".deletesector").click(function(){
                                   var id1 = $(this).parent().attr('id');
                                   $(".deletesector").show("slow").parent().parent().find("span").remove();
                                   var btn = $(this).parent().parent();
                                   $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                                   $("#no").click(function(){
                                   $(this).parent().parent().find("span").remove();
                                   });
                                   $("#yes").click(function(){
                                   $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                                   $.post("<?php echo url('sector/delete') ?>/"+id1,function(data){
                                         btn.hide("slow").next("hr").hide("slow");
                                   });
                                       });
                            });//endof deleting category


                    }
                });


        });

    } );
</script>
