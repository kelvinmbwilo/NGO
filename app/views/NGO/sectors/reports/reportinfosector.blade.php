{{ $report->sector->NGO }}
<div>
<div class="row">
           <div class="col-sm-4">
               <table class="table">
                   <tr>
                       <td>Reporting Date</td>
                       <td id="reporting_date">{{ date("j M Y",strtotime($report->report_date)) }}</td>
                   </tr>

                    <tr>
                        <td>Registration number</td>
                        <td id="reg_no">@if($report->sector->NGOs){{ $report->sector->NGOs->certificate_no }}@endif</td>
                    </tr>
                    <tr>
                        <td>Operation Level</td>
                        <td id="operation">@if($report->sector->NGOs){{ $report->sector->NGOs->operation_level }}@endif</td>
                    </tr>

                   <tr>
                       <td>Sector</td>
                       <td id="category">{{ $report->sector->sector_name }}</td>
                   </tr>
                   <tr>
                       <td>Address</td>
                       <td id="address">@if($report->sector->NGOs){{ $report->sector->NGOs->postal_adress }}@endif</td>
                   </tr>
                   <tr>
                       <td>Region</td>
                   </tr>
               </table>
           </div>
           <div class="col-sm-5">
               <table class="table">
                   <tr>
                       <td>Bussness Telephone:</td><td>@if($report->sector->NGOs){{ $report->sector->NGOs->phone_number }}@endif</td>
                   </tr>
                   <tr>
                       <td>Email Address:</td><td>@if($report->sector->NGOs){{ $report->sector->NGOs->email }}@endif</td>
                   </tr>
                   <tr>
                       <td>Targets:</td>
                       <td>
                           @if($report->targets)
                           <ul style="padding-left: 20px">
                           @foreach($report->targets as $value)
                               <li>{{ $value->description }}</li>
                           @endforeach
                           </ul>
                           @else
                           No targets defined
                           @endif
                       </td>
                   </tr>
                   <tr>
                       <td>Achievements:</td>
                       <td>
                           @if($report->archivements)
                           <ul style="padding-left: 20px">
                               @foreach($report->archivements as $value)
                               <li>{{ $value->description }}</li>
                               @endforeach
                           </ul>
                           @else
                           No targets defined
                           @endif
                       </td>
                   </tr>

               </table>
           </div>
           <div class="col-sm-3">
               <table class="table">
                   <tr>
                       <th>Name</th><td>{{ Auth::user()->firstname }} {{ Auth::user()->middename }} {{ Auth::user()->lastname }} </td>
                   </tr><tr>
                       <th>Title</th><td>{{ Auth::user()->title }}</td>
                   </tr><tr>
                       <th>Address</th><td>@if($report->sector->NGOs){{ $report->sector->NGOs->postal_adress }}@endif</td>
                   </tr>
               </table>
           </div>
       </div>
       <div class="row">



           <div class="col-sm-4">
               <table class="table">
                   <tr>
                       <td>Local Employee</td><td>@if($report->sector->NGOs){{ count($report->sector->NGOs->employmentparticulars()->where('nationality','466')->where('employement_status','Employee')->get()) }}@endif</td>
                   </tr>
                    <tr>
                       <td>Non Local Employee</td><td>@if($report->sector->NGOs){{ count($report->sector->NGOs->employmentparticulars()->where('nationality','!=','466')->where('employement_status','Employee')->get()) }}@endif</td>
                   </tr>
                    <tr>
                       <td>Local Volunteers</td><td>@if($report->sector->NGOs){{ count($report->sector->NGOs->employmentparticulars()->where('nationality','466')->where('employement_status','Volunteer')->get()) }}@endif</td>
                   </tr>
                    <tr>
                       <td>Non Local Volunteers</td><td>@if($report->sector->NGOs){{ count($report->sector->NGOs->employmentparticulars()->where('nationality','!=','466')->where('employement_status','Volunteer')->get()) }}@endif</td>
                   </tr>
                    <tr>
                       <td>Total number of Employees</td><td>@if($report->sector->NGOs){{ count($report->sector->NGOs->employmentparticulars) }}@endif</td>
                   </tr>

               </table>

           </div>
           <div class="col-sm-8">
               <div class="col-md-6">
                   <?php
                   $income= 0;
                   $exp = 0;
                   if($report->revenueIncome){
                       $income = $report->revenueIncome->total;
                   }
                   if($report->expenditure){
                       $exp = $report->expenditure->total;
                   }
                   ?>
                   <table class="table">
                       <tr>
                           <td>Total Income</td><td>{{ $income }}</td>
                       </tr><tr>
                           <td>Total Expenditure</td><td>{{ $exp }}</td>
                       </tr><tr>
                           <td>Income Less Expenditure</td><td>{{{ $income - $exp }}}</td>
                       </tr>
                   </table>

               </div>
               <div class="col-md-6">
                   <table class="table">

                   </table>
               </div>
           </div>
       </div>

</div>
<script>
    $(document).ready(function(){
        var targets = 0;
        var achieves = 0;
        $(".target").each(function(){
            targets++;
        });
        $(".achieve").each(function(){
            achieves++;
        });
        $("#reportinfo").append("<input type='hidden' name='target_count' value='"+targets+"'> ")
        $("#reportinfo").append("<input type='hidden' name='achieve_count' value='"+achieves+"'> ")
    })
</script>