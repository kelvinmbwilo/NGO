<?php

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
            url: "<?php echo url("ngoJson") ?>",
            context: document.body
        }).done(function(data) {

            var ngoDataTable = '<table class="table table-striped table-bordered" id="example2">';
                ngoDataTable += '<thead>';
                ngoDataTable += '<tr>';
                ngoDataTable += '<th> SN </th>';
                ngoDataTable += '<th> Name </th>';
                ngoDataTable += '<th> Registration No </th>';
                ngoDataTable += '<th> Registration Date </th>';
                ngoDataTable += '<th> Registration Type </th>';
                ngoDataTable += '<th> Level Of Operation</th>';
                ngoDataTable += '<th> Priority Sector</th>';
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
                ngoDataTable += '<td>'+val["priority_sector"]+'</td>';
                ngoDataTable += '<td class="action_group" id="'+val["id"]+'">';
                ngoDataTable += '<a href="member" title="View Members" ><i class="fa fa-list text-success"></i> Members</a>&nbsp;&nbsp;&nbsp';
                ngoDataTable += '<a href="bearer" title="View Employee" ><i class="fa fa-th-large text-warning"></i> Employee</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="report" title="View Report" ><i class="fa fa-briefcase text-primary"></i> Reports</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="#edit" title="edit User" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;';
                ngoDataTable += '<a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>';
                ngoDataTable += '</td>';
                ngoDataTable += '</tr>';
                rowCounter++;
            });
            ngoDataTable += '</tbody>';
            ngoDataTable += '</table>';
            $(".bootstrap-admin-panel-content").html(ngoDataTable);
                $('#example2').dataTable({
                    "fnDrawCallback": function( oSettings ) {
                        //redirect to links
                        $("td.action_group a").on("click",function(e){
                            e.preventDefault();
                            var recordId = $(this).parent("td").attr("id");
                            var page = $(this).attr("href");
                            window.location.replace('{{ url("ngo/'+recordId+'/'+page+'") }}');
                        });
                        //editing a room
                        $(".edituser").click(function(){
                            var id1 = $(this).parent().attr('id');
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
                            });
                        });//endof deleting category
                    }
                });


        });

    } );
</script>
