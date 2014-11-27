@extends("layout.master")

@section('breadcrumbs')
<li><a href="{{ url('ngos') }}">NGOs</a></li>
<li class="active">Sectors</li>
@stop

@section('header')
Sectors
@stop

@section('contents')
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
                @if($sectors->count() == 0)
                <h3>There are no members registered to this NGO</h3>
                @else
                <table class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Position </th>
                        <th> Gender </th>
                        <th> Age </th>
                        <th> Nationality</th>
                        <th> Year of Admission</th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($sectors as $sector)
                    <tr>
                        <td>{{ $i++ }}</td>
                        {{--<td style="text-transform: capitalize">{{ $us->name }}</td>--}}
                        {{--<td>{{ $us->position }}</td>--}}
                        {{--<td>{{ $us->sex }}</td>--}}
                        {{--<td>{{ date('Y')-$us->age }}</td>--}}
                        {{--<td>{{ $us->country->name }}</td>--}}
                        {{--<td>{{ $us->year_of_admission }}</td>--}}
                        {{--<td id="{{ $us->id }}">--}}
                            {{--<a href="#edit" title="edit User" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;--}}
                            {{--<a href="#b" title="delete User" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> </a>--}}
                         {{--</td>--}}
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
    </script>

</div>
@stop
