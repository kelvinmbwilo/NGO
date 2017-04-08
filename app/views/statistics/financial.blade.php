@extends('layout.master')

@section('breadcrumbs')
    <li>statistics</li>
@stop

@section('header')
    Financial Reports
@stop

@section('contents')
    <?php
    $priority_sectors = array(
        "Agriculture" => "Agriculture and Food Security",
        "Education" => "Education and Training",
        "Health" => "Health and HIV/AIDS",
        "Tourism" => "Tourism and Wildlife",
        "Social" => "Social Security and Social Protection",
        "Legal" => "Legal and Human Rights",
        "Good" => "Good Governance",
        "Gender" => "Gender and Women Empowerment",
        "Water" => "Water and Sanitation",
        "Environment" => "Environment and Climate Change",
        "Labor" => "Labor and Employment",
        "Finance" => "Finance",
        "Mineral" => "Mineral and Energy ",
        "Sports" => "Sports and Culture",
        "Transport" => "Transport and Infrastructure",
    );
    $priority_sectors_count = count($priority_sectors);

    ?>
    <table class="table table-bordered table-responsive" id="exampleall">
        <thead>
        <tr>
            <th>Priority Sector</th>
            <th>NGO</th>
            <th>Year</th>
            <th>Income</th>
            <th>Expenditure</th>
            <th>Income Less Expenditure</th>
            <th>Assets</th>
            <th>Liabilities</th>
            <th>Net Worth</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Expendeture::all() as $sector)
            <?php
            if($sector->NGOs){
            $income = RevenueIncome::where('NGO_id', $sector->NGOs->id)->first();
            ?>
            <tr>
                <?php $index = 0;?>
                @foreach($priority_sectors as $key => $priority_sector)
                    @if($sector->NGOs->priority_sector==$key) <?php $index = 0;?>
                    <td>{{ $priority_sector }}</td>@else
                        <?php $index++?>
                    @endif
                @endforeach
                <?php $index?>
                @if($index == $priority_sectors_count )
                    <td>&nbsp;</td> @endif
                <td>@if($sector->NGOs) {{ $sector->NGOs->name }} @endif</td>
                <td>@if( $sector->AnnualReport ) {{ $sector->AnnualReport->report_date }} @endif</td>
                <td>{{ $income->total }}</td>
                <td>{{ $sector->total }}</td>
                <td>{{ $income->total - $sector->total }}</td>
                <td>{{ $sector->assets }}</td>
                <td>{{ $sector->liabilities }}</td>
                <td>{{{ $sector->assets - $sector->liabilities }}}</td>
            </tr>

            <?php
            }
            ?>
        @endforeach
        </tbody>
        <tfooter>
            <th colspan="3">Total</th>
            <th id="income"></th>
            <th id="expenditure"></th>
            <th id="less"></th>
            <th id="asset"></th>
            <th id="liab"></th>
            <th id="net"></th>
        </tfooter>

    </table>
    <script>
        $(document).ready(function () {
            $('#exampleall').dataTable(
                {
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({ page: 'current' }).nodes();
                        var last = null;



                        rows.each(function (group, i) {
//                            console.log(group,i);
                            if (last !== group) {
//                                $(rows).eq(i).before(
//                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
//                                );
//
                                last = group;
                            }
                        });
                    },
                    "footerCallback": function (row, data, start, end, display) {
//                        console.log(data);
                        var api = this.api( {"filter": "applied"}),
                            intVal = function (i) {
                            console.log(i)
                                return typeof i === 'string' ?
                                    i.replace(/[, Rs]|(\.\d{2})/g, "") * 1 :
                                    typeof i === 'number' ?
                                        i : 0;
                            },
                            income = api
                                .column(3)
                                .data()
                                .reduce(function (a, b) {
                                    console.log(a, b)
                                    return intVal(a) + intVal(b);
                                }, 0),

                            expenditure = api
                                .column(4)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0),
                            less = api
                                .column(5)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0),
                            liab = api
                                .column(6)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0)
                            asset = api
                                .column(7)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0),
                            net = api
                                .column(8)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0)
                            ;

                        $("th#income").text(income);
                        $("th#expenditure").text(expenditure);
                        $("th#less").text(less);
                        $("th#liab").text(liab);

                    }
                }
            );

        })
    </script>
@stop