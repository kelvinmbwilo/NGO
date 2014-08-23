<?php

class MembersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * @param $id
	 * @return Response
	 */
	public function index($id)
	{
		$ngo = NGOs::find($id);
        return View::make('NGO.members.index',compact('ngo'));
	}

    /**
	 * Display a listing of the resource.
	 * @param $id
	 * @return Response
	 */
	public function memberlist($id)
	{
		$ngo = NGOs::find($id);
        return View::make('NGO.members.list',compact('ngo'));
	}


	/**
	 * Show the form for creating a new resource.
	 * @param $id
	 * @return Response
	 */
	public function create($id)
	{
        $ngo = NGOs::find($id);
        return View::make('NGO.members.add',compact('ngo'));
	}


	/**
	 * Store a newly created resource in storage.
	 * @param $id
	 * @return Response
	 */
	public function store($id)
	{
		$member = NGOsMembers::create(array(
           'NGO_id' => $id,
           'name' => Input::get('name'),
           'position' => Input::get('position'),
           'sex' => Input::get('sex'),
           'age' => Input::get('age'),
           'nationality' => Input::get('country'),
           'year_of_admission' => Input::get('admission'),
        ));
        $name = $member->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Add  new member to ".NGOs::find($id)->name." named ". $name
        ));
        return "<h4 class='text-success'>Member Added Successfull</h4>";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
        return View::make('NGO.members.edit',compact('ngo','member'));
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
	 * @param  int  $member_id
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$member_id)
	{
		$member = NGOsMembers::find($member_id);
        $name = $member->name;
        $member->delete();
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Delete member  named ". $name
        ));
	}


}
