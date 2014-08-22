<?php

class NGOController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('NGO.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('NGO.add');
	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function ngolist()
	{
		return View::make('NGO.list');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$ngo = NGOs::create(array(
           'name' => Input::get('name'),
           'registation_date' => Input::get('reg_date'),
           'certificate_no' => Input::get('certificate'),
           'registation_type' => Input::get('reg_type'),
           'postal_adress' => Input::get('postal'),
           'region' => Input::get('region'),
           'district' => Input::get('district'),
           'phone_number' => Input::get('phone'),
           'email' => Input::get('email'),
           'priority_sector' => Input::get('sector'),
        ));
        $name = $ngo->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Add NGO nammed ".$name
        ));
        return "<h4 class='text-success'>NGO Added Successfull</h4>";
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
	 * @return Response
	 */
	public function edit($id)
	{
		$ngo = NGOs::find($id);
        return View::make('NGO.edit',compact('ngo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ngo = NGOs::find($id);
        $ngo->name = Input::get('name');
        $ngo->registation_date = Input::get('reg_date');
        $ngo->registation_type = Input::get('reg_type');
        $ngo->postal_adress = Input::get('postal');
        $ngo->region = Input::get('region');
        $ngo->district = Input::get('district');
        $ngo->phone_number = Input::get('phone');
        $ngo->email = Input::get('email');
        $ngo->priority_sector = Input::get('sector');
        $ngo->save();
        $name = $ngo->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Update NGO nammed ".$name
        ));
        return "<h4 class='text-success'>NGO Updated Successfull</h4>";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$ngo = NGOs::find($id);
        $ngo->delete();
	}


}
