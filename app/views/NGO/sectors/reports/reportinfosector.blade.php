
<div>
<h3>NGO Name:{{  $NGOs ->name }}</h3>
<div class="row">
           <div class="col-sm-4">
               <table class="table">
                   <tr>
                       <td>Reporting Date</td>
                       <td id="reporting_date">{{ date("j M Y",strtotime($report->report_date)) }}</td>
                   </tr>
                   <tr>
                       <td>Sector</td>
                       <td id="category">{{ $report->sector->sector_name }}</td>
                   </tr>

               </table>
           </div>
           <div class="col-sm-8">
               <table class="table">
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
                               <li>{{ $value->archivements }}</li>
                               @endforeach
                           </ul>
                           @else
                           No targets defined
                           @endif
                       </td>
                   </tr>

               </table>
           </div>
       </div>
       <div class="row">

           <div class="row-fluid ">
               <div class="col-md-12">
                   <?php
                   $income= 0;
                   $exp = 0;
                   if($report->SectorRevenueIncome){
                       $income = $report->SectorRevenueIncome->total;
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