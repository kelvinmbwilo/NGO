<div class="row">
    <div class="col-sm-4">
        <table>
            <tr>
                <td>Reporting Date</td>
                <td></td>
            </tr>
            <tr>
                <td>NGO Name</td>
                <td></td>
            </tr>
            <tr>
                <td>Registration number</td>
                <td></td>
            </tr>
            <tr>
                <td>Operation Level</td>
                <td></td>
            </tr>
            <tr>
                <td>Category</td>
                <td></td>
            </tr>
            <tr>
                <td>Address</td>
                <td></td>
            </tr>
            <tr>
                <td>Region</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-3">
        Bussness Telephone: <br>
        Email Address:
        <br>
        Targets:<br><br>

        Achievements:<br><br>
    </div>
    <div class="col-sm-5">
        <table>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Address</th>
            </tr>
            <tr>
                <td>fname juma ally</td>
                <td>chairperson</td>
                <td>Box 450 Dar</td>
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