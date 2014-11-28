<?php

class SECTORController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sector = SECTORs::all();
        return View::make("NGO.index",compact("sector"));

	}
    public function sectorJson()
	{
        $sector = Sector::all();
        return Response::json($sector);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('SECTOR.add');
	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function sectorlist()
	{
		return View::make('SECTOR.list');
	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function sectorReport($id,$nid)
	{
        $ngo = NGOs::find($nid);
        $sector = Sector::find($id);
		return View::make('NGO.sectors.reports.index',compact(array("ngo","sector")));
	}
    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function goodpractises($id,$nid)
	{
		return View::make('SECTOR.practises.list',compact(array("id","nid")));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$sector = Sector::create(array(
           'sector_name' => Input::get('sector_name'),
        ));
        $name = $sector->sector_name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Add Sector nammed ".$name
        ));
        return "<h4 class='text-success'>Sector Added Successfull</h4>";
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
		$sector = Sector::find($id);
        return View::make('SECTOR.edit',compact('sector'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sector = Sector::find($id);
        $sector->sector_name = Input::get('sector_name');
        $sector->save();
        $name = $sector->sector_name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Update Sector nammed ".$name
        ));
        return "<h4 class='text-success'>Sector Updated Successfull</h4>";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sector = Sector::find($id);
        $name = $sector->name;
        $sector->delete();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Delete Sector nammed ".$name
        ));
	}


}
