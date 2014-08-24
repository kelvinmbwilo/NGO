<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
<!--        <h5 class="row-title before-themeprimary"><i class="fa  fa-arrow-circle-o-right themeprimary"></i>Annual Report</h5>-->
        <div id="WiredWizard" class="wizard wizard-wired" data-target="#WiredWizardsteps">
            <ul class="steps" style="font-size: 0.7em">
                <li data-target="#wiredstep1" class="active"><span class="step">1</span><span class="title">Basic</span><span class="chevron"></span></li>
                <li data-target="#wiredstep2"><span class="step">2</span><span class="title">Targets</span> <span class="chevron"></span></li>
                <li data-target="#wiredstep3"><span class="step">3</span><span class="title">Achievement</span> <span class="chevron"></span></li>
                <li data-target="#wiredstep4"><span class="step">4</span><span class="title">Challenges&<br>Good practices</span> <span class="chevron"></span></li>
                <li data-target="#wiredstep5"><span class="step">5</span><span class="title">Financial<br>Statement</span> <span class="chevron"></span></li>
                <li data-target="#wiredstep6"><span class="step">6</span><span class="title">Expenditure</span> <span class="chevron"></span></li>
                <li data-target="#wiredstep7"><span class="step">7</span><span class="title">Attachments</span> <span class="chevron"></span></li>
                <li data-target="#wiredstep8"><span class="step">8</span><span class="title">Summary</span> <span class="chevron"></span></li>
            </ul>

        </div>
        <div class="step-content" id="WiredWizardsteps">
            <div class="step-pane active" id="wiredstep1">
                @include('NGO.reports.add_files.basic')
            </div>
            <div class="step-pane" id="wiredstep2">
                @include('NGO.reports.add_files.targets')
            </div>
            <div class="step-pane" id="wiredstep3">
                @include('NGO.reports.add_files.achivement')
            </div>
            <div class="step-pane" id="wiredstep4">
                @include('NGO.reports.add_files.challane')
            </div>
            <div class="step-pane" id="wiredstep5">
                @include('NGO.reports.add_files.financial')
            </div>
            <div class="step-pane" id="wiredstep6">
                @include('NGO.reports.add_files.expentiture')
            </div>
            <div class="step-pane" id="wiredstep7">
                Attach Files<br>

                <input type="file" class="input-xs">
                <a href="#" class="btn btn-xs btn-primary pull-right">add more</a>

            </div>
            <div class="step-pane" id="wiredstep8">
                Summary

                <input type="submit" class="btn btn-primary btn-lg" value="Confirm Submission" />
            </div>
        </div>
        <div class="actions actions-footer" id="WiredWizard-actions">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm btn-prev"> <i class="fa fa-angle-left"></i>Prev</button>
                <button type="button" class="btn btn-default btn-sm btn-next" data-last="Finish">Next<i class="fa fa-angle-right"></i></button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/fuelux/wizard/wizard-custom.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.js') }}"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $('#simplewizardinwidget').wizard();
        $('#simplewizard').wizard();
        $('#tabbedwizard').wizard().on('finished', function (e) {
            Notify('Thank You! All of your information saved successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
        });
        $('#WiredWizard').wizard();
    });
</script>