<div class="col-sm-12" id="listuser">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">
                    {{--{{ $ngo->name }} Members--}}
                    Sectors
                    <button class="btn btn-primary btn-xs pull-left add" id="add"><i class="fa fa-plus"></i> add</button>
                </div>
            </div>
            <div class="bootstrap-admin-panel-content">

                <table class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th>Sector Name </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($sectors as $sector)
                    <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sector->sector_name }}</td>
                    <td class="action_group" id="{{ $sector->sector_id }}">
                    <a href="goodpractises" title="Sector's Good Practises" class="goodpractises"><i class="fa fa-list text-success"></i>Good Practise</a>&nbsp;&nbsp;&nbsp
                    <a href="achievements" title="Sector's Achievements" class="achievements"><i class="fa fa-list text-success"></i> Achievements</a>&nbsp;&nbsp;&nbsp
                    <a href="challanges" title="Sector's Challanges" class="challanges"><i class="fa fa-list text-success"></i> Challanges</a>&nbsp;&nbsp;&nbsp
                    <a href="expenditure" title="Sector's Expenditure" class="expenditure"><i class="fa fa-list text-success"></i> Expenditure</a>&nbsp;&nbsp;&nbsp
                    <a href="revenueIncome" title="Sector's Revenue and Income" class="revenueIncome"><i class="fa fa-list text-success"></i> Revenue and Income</a>&nbsp;&nbsp;&nbsp
                    <a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>
                    </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <!--script to process the list of users-->
    <script>
        $("td.action_group a").on("click",function(e){
            e.preventDefault();
         var recordId = $(this).parent("td").attr("id");
            var page = $(this).attr("href");
            var title = $(this).attr("title");
            window.sector_name = $(this).parent("td").parent("tr td:first").html();
            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modal+= '<div class="modal-dialog" style="margin-left: 10%;margin-right: 10%;width:80%">';
            modal+= '<div class="modal-content">';
            modal+= '<div class="modal-header">';
            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal+= '<h2 class="modal-title" id="myModalLabel">'+window.sector_name+'  '+title+' for ({{ $ngo->name }})</h2>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';
            modal+= ' </div>';
            modal+= '</div>';
            modal+= '</div>';

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url('sector') ?>/"+recordId+"/"+page+"/{{ $ngo->id }}");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })


         });
    </script>

</div>