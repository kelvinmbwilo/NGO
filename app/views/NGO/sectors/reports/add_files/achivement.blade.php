<h4><b>Achievements  </b>Describe achievements made for each target showing beneficiaries in terms of number, gender and/geographical location etc.</h4>
<span class="help-block">**Empty achievements  will not be submitted</span>
Achievement1<br>
<textarea rows="2" placeholder="Achievement1" class="form-control achieve" name="achievements1"></textarea>
<br>
Achievement2<br>
<textarea rows="2" placeholder="Achievement2"  class="form-control achieve" name="achievements2"></textarea>
<br>

<span id="addedachievements"></span>
<a id="addachievements" href="#as" class="btn btn-xs btn-primary">add more</a>

<script>
    $(document).ready(function(){
        var counter = 2;
        $("#addachievements").click(function(){
            counter++;
            var new_target = 'Achievement'+counter+'<br>';
            new_target += '<textarea name="achievement'+counter+'" rows="2" placeholder="Achievement'+counter+'"  class="form-control achieve"></textarea><br>'
            $("#addedachievements").append(new_target);


        })
    })
</script>