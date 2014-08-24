<h4><b>Targets </b>Include in your description type of planned interventions, target population in terms of number, gender and/or geographical location etc. </h4>
<span class="help-block">**Empty targets will not be submitted</span>
Target1<br>
<textarea rows="2" placeholder="Target1" class="form-control" name="target1"></textarea>
<br>
Target2<br>
<textarea rows="2" placeholder="Target2"  class="form-control" name="target2"></textarea>
<br>
<span id="addedtargets"></span>
<a id="addtargets" href="#as" class="btn btn-xs btn-primary">add more</a>

<script>
    $(document).ready(function(){
        var counter = 2;
        $("#addtargets").click(function(){
            counter++;
            var new_target = 'Target'+counter+'<br>';
            new_target += '<textarea name="target'+counter+'" rows="2" placeholder="Target'+counter+'"  class="form-control"></textarea><br>'
            $("#addedtargets").append(new_target);
        })
    })
</script>