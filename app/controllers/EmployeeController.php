<?php

class EmployeeController extends \BaseController {

    /**
     * Display a listing of the resource.
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        $ngo = NGOs::find($id);
        return View::make('NGO.employee.index',compact('ngo'));
    }

    /**
     * Display a listing of the resource.
     * @param $id
     * @return Response
     */
    public function bearerlist($id)
    {
        $ngo = NGOs::find($id);
        return View::make('NGO.employee.list',compact('ngo'));
    }


    /**
     * Show the form for creating a new resource.
     * @param $id
     * @return Response
     */
    public function create($id)
    {
        $ngo = NGOs::find($id);
        return View::make('NGO.employee.add',compact('ngo'));
    }


    /**
     * Store a newly created resource in storage.
     * @param $id
     * @return Response
     */
    public function store($id)
    {
        $member = EmploymentParticulars::create(array(
            'NGO_id' => $id,
            'name' => Input::get('name'),
            'gender' => Input::get('sex'),
            'date_of_birth' => Input::get('age'),
            'nationality' => Input::get('country'),
            'year_assumed_office' => Input::get('admission'),
            'title' => Input::get('title'),
            'employement_status' => Input::get('status'),
            'phone' => Input::get('phone'),
            'email' => Input::get('email'),
            'physical_adress' => Input::get('address'),
        ));
        $name = $member->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Add  new employee to ".NGOs::find($id)->name." named ". $name
        ));
        return "<h4 class='text-success'>Employee/Bearer Added Successfull</h4>";
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
     * @param  int  $bearer_id
     * @return Response
     */
    public function edit($id,$bearer_id)
    {
        $ngo = NGOs::find($id);
        $member = EmploymentParticulars::find($bearer_id);
        return View::make('NGO.employee.edit',compact('ngo','member'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  int  $bearer_id
     * @return Response
     */
    public function update($id,$bearer_id)
    {
        $ngo = NGOs::find($id);
        $member = EmploymentParticulars::find($bearer_id);
        $member->name = Input::get('name');
        $member->gender = Input::get('sex');
        $member->date_of_birth = Input::get('age');
        $member->nationality = Input::get('country');
        $member->year_assumed_office = Input::get('admission');
        $member->title = Input::get('title');
        $member->employement_status = Input::get('status');
        $member->phone = Input::get('phone');
        $member->email = Input::get('email');
        $member->physical_adress = Input::get('address');
        $member->save();
        $name = $member->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Update employee from ".$ngo->name." named ". $name
        ));
        return "<h4 class='text-success'>Employee/Bearer Updated Successfull</h4>";
    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $bearer_id
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$bearer_id)
    {
        $member = EmploymentParticulars::find($bearer_id);
        $name = $member->name;
        $member->delete();
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Delete employee from ".NGOs::find($id)->name." named ". $name
        ));
    }


}
