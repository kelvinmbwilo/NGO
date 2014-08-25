<?php

?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
                {{ $ngo->name }} Office Bearers and Employment Particulars
                <button class="btn btn-primary btn-xs pull-left add" id="add"><i class="fa fa-plus"></i> add</button>
            </div>
        </div>
        <div class="bootstrap-admin-panel-content">
            @if($ngo->employmentparticulars->count() == 0)
            <h3>There are no Employee/bearer registered to this NGO</h3>
            @else
            <table class="table table-striped table-bordered" id="example2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Gender </th>
                    <th> Age </th>
                    <th> Nationality</th>
                    <th> Title</th>
                    <th> Employment Status</th>
                    <th> Year of Admission</th>
                    <th> Phone</th>
                    <th> Email</th>
                    <th> Address</th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($ngo->Employment_particulars as $us)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td style="text-transform: capitalize">{{ $us->name }}</td>
                    <td>{{ $us->gender }}</td>
                    <td>{{ date('Y')-$us->date_of_birth }}</td>
                    <td>{{ $us->country->name }}</td>
                    <td>{{ $us->title }}</td>
                    <td>{{ $us->employement_status }}</td>
                    <td>{{ $us->year_assumed_office }}</td>
                    <td>{{ $us->phone }}</td>
                    <td>{{ $us->email }}</td>
                    <td>{{ $us->physical_adress }}</td>
                    <td id="{{ $us->id }}">
                        <a href="#edit" title="edit User" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                        <a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>
                     </td>
                </tr>
                @endforeach

                </tbody>
            </table>

            @endif
        </div>
    </div>
</div>


<!--script to process the list of users-->
<script>
    /* Table initialisation */
    $(document).ready(function() {
        $('#example2').dataTable({
            "fnDrawCallback": function( oSettings ) {
                //editing a room
                $(".edituser").click(function(){
                    var id1 = $(this).parent().attr('id');
                    var id1 = $(this).parent().attr('id');
                    var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                    modal+= '<div class="modal-dialog">';
                    modal+= '<div class="modal-content">';
                    modal+= '<div class="modal-header">';
                    modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                    modal+= '<h2 class="modal-title" id="myModalLabel">Update Employee/Bearer Information</h2>';
                    modal+= '</div>';
                    modal+= '<div class="modal-body">';
                    modal+= ' </div>';
                    modal+= '</div>';
                    modal+= '</div>';

                    $("body").append(modal);
                    $("#myModal").modal("show");
                    $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                    $(".modal-body").load("<?php echo url("ngo/{$ngo->id}/bearer/edit") ?>/"+id1);
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
                        $.post("<?php echo url("ngo/".$ngo->id."/bearer/delete") ?>/"+id1,function(data){
                            btn.hide("slow").next("hr").hide("slow");
                        });
                    });
                });//endof deleting category
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
            modal+= '<h2 class="modal-title" id="myModalLabel">Add New {{ $ngo->name }} Bearer/Employee</h2>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';
            modal+= ' </div>';
            modal+= '</div>';
            modal+= '</div>';

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("ngo/{$ngo->id}/bearer/add") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        })

    } );
</script>
