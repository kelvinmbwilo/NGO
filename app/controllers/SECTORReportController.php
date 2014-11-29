<?php

class SECTORReportController extends \BaseController {

    /**
     * Display a listing of the resource.
     * @param $id
     * @return Response
     */
    public function index($id,$nid)
    {
        if($nid == 'a'){
            $ngo = NGOs::find($id);
            return View::make('NGO.reports.index',compact('ngo'));
        }

        if($nid!='a'){

            $ngo = NGOs::find($id);
            $sector = Sector::find($nid);
            return View::make('NGO.sectors.reports.index',compact('ngo','sector'));
        }


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
    public function create($id,$nid)
    {
        $sector = Sector::find($id);
        $ngo = NGOs::find($nid);
        return View::make('NGO.sectors.reports.add',compact(array('ngo','sector')));
    }


    /**
     * Store a newly created resource in storage.
     * @param $id
     * @return Response
     */
    public function store($id,$nid)
    {
        echo "<h4 class='text-success'>Report Added Successful</h4>";
        $report = SectorAnnualReport::create(array(
            'sector_id' => $id,
            'NGO_id' => $nid,
            'report_date' => Input::get('reg_date'),
            'year' => Input::get('report_year'),
            'annual_meeting_date' => Input::get('meeting_date'),
            'username' => Auth::user()->username
        ));
        //achievements
//        for($i =0 ;$i < Input::get('achieve_count'); $i++ ){
//            $j = $i+1;
//            if(Input::get('achievements'.$j)!= ''){
//                SectorArchivements::create(array(
//                    'sector_id' => $id,
//                    'NGO_id' => $nid,
//                    'report_id' => $report->id,
//                    'archivements' => Input::get('achievements'.$j)
//
//                ));
//            }
//        }

        //targets
        for($i =0 ;$i < Input::get('target_count'); $i++ ){
            $j = $i+1;
            if(Input::get('target'.$j)!= ''){
                SectorTargets::create(array(
                    'sector_id' => $id,
                    'NGO_id' => $id,
                    'report_id' => $report->id,
                    'description' => Input::get('target'.$j)

                ));
            }
        }

        //Challanges
        SectorChallanges::create(array(
            'sector_id' => $id,
            'NGO_id' => $id,
            'report_id' => $report->id,
            'challanges' => Input::get('challange')
        ));
        //Good Practices
        SectorPractices::create(array(
            'sector_id' => $id,
            'NGO_id' => $id,
            'report_id' => $report->id,
            'practices' => Input::get('goodpractice')
        ));

        //finacial statement
        SectorRevenueIncome::create(array(
            'sector_id' => $id,
            'NGO_id' => $id,
            'report_id' => $report->id,
            'amount_from_last_year' => Input::get('amount_forward'),
            'public_support' => Input::get('public_support'),
            'ngo_subsides' => Input::get('subsidies'),
            'local_granting' => Input::get('local_granting'),
            'private_sector_support' => Input::get('corparate'),
            'grant_from_foreign' => Input::get('grand'),
            'other_sources' => Input::get('other_source'),
            'total' => Input::get('other_source')+Input::get('grand')+Input::get('corparate')+Input::get('local_granting')+Input::get('public_support')+Input::get('subsidies')+Input::get('amount_forward'),
        ));
        //expendture
        SectorExpendeture::create(array(
            'sector_id' => $id,
            'NGO_id' => $id,
            'report_id' => $report->id,
            'direct_cost' => Input::get('program_cost'),
            'total' => Input::get('program_cost'),
        ));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($nid,$id)
    {
        $report = SectorAnnualReport::find($id);
        $NGOs = NGOs::find($nid);
        return View::make("NGO.sectors.reports.reportinfosector",compact("report","NGOs"));
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
        $member = SectorAnnualReport::find($report_id);
        $name = $member->year;
        $member->delete();
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Delete report for year  ". $name
        ));
    }

    public function summary($id){
        $ngo = NGOs::find($id);
        return View::make('NGO.summary',compact('ngo'));
    }


}