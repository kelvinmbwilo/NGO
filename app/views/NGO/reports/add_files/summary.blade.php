<div class="row">
    <div class="col-sm-4">
        <table>
            <tr>
                <td>Reporting Date</td>
                <td id="reporting_date"></td>
            </tr>
            <tr>
                <td>NGO Name</td>
                <td id="report_name"></td>
            </tr>
            <tr>
                <td>Registration number</td>
                <td id="reg_no"></td>
            </tr>
            <tr>
                <td>Operation Level</td>
                <td id="operation"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td id="category"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td id="address"></td>
            </tr>
            <tr>
                <td>Region</td>
                <td id="region"></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-3">
        Bussness Telephone: <span id="phone"></span><br>
        Email Address: <span id="email"></span>
        <br>
        Targets: <span id="targets"></span><br><br>

        Achievements: <span id="archive"></span><br><br>
    </div>
    <div class="col-sm-5">
        <table>
            <tr>
                <th>Name</th><td>{{ Auth::user()->firstname }} {{ Auth::user()->middename }} {{ Auth::user()->lastname }} </td>
            </tr><tr>
                <th>Title</th><td>{{ Auth::user()->title }}</td>
            </tr><tr>
                <th>Address</th><td></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        Local Employee:<br>
        Non Local Employee <br>
        Local Volunteers<br>
        Non Local Volunteers: <br>
        Total number of Employees:
    </div>
    <div class="col-sm-8">
        <div class="col-md-6">
            Total Income:<br>
            Total Expenditure:<br>
            Income Less Expenditure
        </div>
        <div class="col-md-6">
            Total Liabilities<br>
            Total value of Assets<br>
            net Worth(Asset less Liabilities)
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