<?php

class NGOReportController extends \BaseController {

    /**
     * Display a listing of the resource.
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        $ngo = NGOs::find($id);
        return View::make('NGO.reports.index',compact('ngo'));
    }

    /**
     * Display a listing of the resource.
     * @param $id
     * @return Response
     */
    public function memberlist($id)
    {
        $ngo = NGOs::find($id);
        return View::make('NGO.reports.list',compact('ngo'));
    }


    /**
     * Show the form for creating a new resource.
     * @param $id
     * @return Response
     */
    public function create($id)
    {
        $ngo = NGOs::find($id);
        return View::make('NGO.reports.add',compact('ngo'));
    }


    /**
     * Store a newly created resource in storage.
     * @param $id
     * @return Response
     */
    public function store($id)
    {
        echo "<h4 class='text-success'>Report Added Successful</h4>";
        $report = AnnualReport::create(array(
            'NGO_id' => $id,
            'report_date' => Input::get('reg_date'),
            'year' => Input::get('report_year'),
            'annual_meeting_date' => Input::get('meeting_date'),
            'username' => Auth::user()->username
        ));

        //achievements
        for($i =0 ;$i < Input::get('achieve_count'); $i++ ){
            $j = $i+1;
            if(Input::get('achievements'.$j)!= ''){
                NGOArchivements::create(array(
                    'NGO_id' => $id,
                    'report_id' => $report->id,
                    'description' => Input::get('achievements'.$j)

                ));
            }
        }

        //targets
        for($i =0 ;$i < Input::get('target_count'); $i++ ){
            $j = $i+1;
            if(Input::get('target'.$j)!= ''){
                NGOTargets::create(array(
                    'NGO_id' => $id,
                    'report_id' => $report->id,
                    'description' => Input::get('target'.$j)

                ));
            }
        }

        //Challanges
        NGOChallanges::create(array(
            'NGO_id' => $id,
            'report_id' => $report->id,
            'challanges' => Input::get('challange')
        ));
        //Good Practices
        NGOPractices::create(array(
            'NGO_id' => $id,
            'report_id' => $report->id,
            'description' => Input::get('goodpractice')
        ));

        //finacial statement
        RevenueIncome::create(array(
            'NGO_id' => $id,
            'report_id' => $report->id,
            'amount_from_last_year' => Input::get('amount_forward'),
            'tax_relief' => Input::get('tax_relief'),
            'government_subsidies' => Input::get('subsidies'),
            'members_fee' => Input::get('member_fee'),
            'economic_investment' => Input::get('investment'),
            'user_fees' => Input::get('user_fee'),
            'public_support' => Input::get('public_support'),
            'local_granting' => Input::get('local_granting'),
            'private_sector_support' => Input::get('corparate'),
            'grand_from_foreign' => Input::get('grand'),
            'other_sources' => Input::get('other_source'),
            'total' => Input::get('other_source')+Input::get('grand')+Input::get('corparate')+Input::get('local_granting')+Input::get('public_support')+Input::get('user_fee')+Input::get('investment')+Input::get('member_fee')+Input::get('subsidies')+Input::get('tax_relief')+Input::get('amount_forward'),
        ));
        //expendture
        Expendeture::create(array(
            'NGO_id' => $id,
            'report_id' => $report->id,
            'direct_cost' => Input::get('program_cost'),
            'adminstrative_cost' => Input::get('admin_cost'),
            'liabilities' => Input::get('liabilities'),
            'assets' => Input::get('assets'),
            'total' => Input::get('admin_cost')+Input::get('program_cost'),
        ));
//        $name = $member->name;
//        Logs::create(array(
//            "user_id"=>  Auth::user()->id,
//            "action"  =>"Add  new member to ".NGOs::find($id)->name." named ". $name
//        ));
//        return "<h4 class='text-success'>Member Added Successfull</h4>";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $report = AnnualReport::find($id);
        return View::make("NGO.reports.reportinfo",compact("report"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $member_id
     * @return Response
     */
    public function edit($id,$member_id)
    {
        $ngo = NGOs::find($id);
        $member = NGOsMembers::find($member_id);
        return View::make('NGO.reports.edit',compact('ngo','member'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  int  $member_id
     * @return Response
     */
    public function update($id,$member_id)
    {
        $ngo = NGOs::find($id);
        $member = NGOsMembers::find($member_id);
        $member->name = Input::get('name');
        $member->position = Input::get('position');
        $member->sex = Input::get('sex');
        $member->age = Input::get('age');
        $member->nationality = Input::get('country');
        $member->year_of_admission = Input::get('admission');
        $member->save();
        $name = $member->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Update member from ".NGOs::find($id)->name." named ". $name
        ));
        return "<h4 class='text-success'>Member Updated Successfull</h4>";
    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $report_id
     * @return Response
     */
    public function destroy($report_id)
    {
        $member = AnnualReport::find($report_id);
        $name = $member->year;
        $member->delete();
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Delete reoport for year  ". $name
        ));
    }


}