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
            var income = 0, expenditure = 0, less = 0, liab = 0, asset = 0, net = 0;
            $('#exampleall').dataTable(
                {
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({page: 'current'}).nodes();
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
                        display.sort();
                        var intVal = function (i) {
                            return typeof i === 'string' ?
                                i.replace(/[, Rs]|(\.\d{2})/g, "") * 1 :
                                typeof i === 'number' ?
                                    i : 0;
                        }
                        var newData = [];

                        $.each(display, function (rowIndex, rowValue) {
                            newData.push(data[rowValue]);
                        })

                        if (newData.length > 0) {
                            income = 0, expenditure = 0, less = 0, liab = 0, asset = 0, net = 0;
                            newData.reduce(function (accumulator,
                                                     currentValue,
                                                     currentIndex,
                                                     array) {
                                if (accumulator) {
                                    income += intVal(accumulator[3]);
                                    expenditure += intVal(accumulator[4]);
                                    less += intVal(accumulator[5]);
                                    liab += intVal(accumulator[6]);
                                    asset += intVal(accumulator[7]);
                                    net += intVal(accumulator[8]);
                                }

                                if (currentValue) {
                                    income += intVal(currentValue[3]);
                                    expenditure += intVal(currentValue[4]);
                                    less += intVal(currentValue[5]);
                                    liab += intVal(currentValue[6]);
                                    asset += intVal(currentValue[7]);
                                    net += intVal(currentValue[8]);
                                }

                            })


                        }
                        if (newData.length == 1) {

                            income += intVal(newData[0][3]);
                            expenditure += intVal(newData[0][4]);
                            less += intVal(newData[0][5]);
                            liab += intVal(newData[0][6]);
                            asset += intVal(newData[0][7]);
                            net += intVal(newData[0][8]);

                        }

                        $("th#income").text(income);
                        $("th#expenditure").text(expenditure);
                        $("th#less").text(less);
                        $("th#liab").text(liab);
                        $("th#asset").text(asset);
                        $("th#net").text(net);

                    }
                }
            );

        })
    </script>
@stop