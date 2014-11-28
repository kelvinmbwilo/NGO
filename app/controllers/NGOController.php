<?php

class NGOController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $ngos = NGOs::all();
        return View::make("NGO.index",compact("ngos"));

	}
    public function ngoJsonAll()
	{
        $ngos = NGOs::all();
        return Response::json($ngos);

	}
    public function ngoJsonMult()
	{
        $ngos = array();
        foreach(NGOs::all() as $ngo){
            if($ngo->Sectors){
                if(count($ngo->Sectors()->get()) != 1 && count($ngo->Sectors()->get()) != 0 ){
                    $ngos[]=$ngo;
                }
            }

        }

//        $ng0_ids = DB::table('NGOs_Sector')->select('n_gos_id')->having(DB::raw('count(*) as sector, sector_id'),">",1)->get();
//
//        $ngos = DB::table('NGOs')
//            ->whereNotIn('id', $ng0_ids)->get();
        return Response::json($ngos);

	}
    public function ngoJsonSingle()
	{

        $ngos = array();
        foreach(NGOs::all() as $ngo){
            if($ngo->Sectors){
                if(count($ngo->Sectors()->get()) == 1 ){
                    $ngos[]=$ngo;
                }
            }
        }
        return Response::json($ngos);

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function listPrioritySectors($id)
	{
        $sectors = DB::table('NGOs')
            ->where('NGOs.id', '=', $id)
            ->join('NGOs_Sector', 'NGOs.id', '=', 'NGOs_Sector.n_gos_id')
            ->join('sectors', 'NGOs_Sector.sector_id', '=', 'sectors.id')
            ->get();
        $ngo = NGOs::find($id);
        return View::make('NGO.sectors.index',compact(array("sectors","ngo")));
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
           'operation_level' => Input::get('operation'),
           'postal_adress' => Input::get('postal'),
           'region' => Input::get('region'),
           'district' => Input::get('district'),
           'phone_number' => Input::get('phone'),
           'email' => Input::get('email'),
        ));

        $name = $ngo->name;
        foreach(Input::get('sector') as $sector_id){
            $ngo_sector = NGOSector::create(array(
                "sector_id" => $sector_id,
                "n_gos_id" => $ngo->id
            ));
            $sector = Sector::find($sector_id);
            Logs::create(array(
                "user_id"=>  Auth::user()->id,
                "action"  =>"Add Sector ".$sector['sector_name']." to NGO nammed ".$name
            ));
        }

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
        $ngo->certificate_no = Input::get('certificate');
        $ngo->region = Input::get('region');
        $ngo->district = Input::get('district');
        $ngo->phone_number = Input::get('phone');
        $ngo->email = Input::get('email');
        $ngo->operation_level = Input::get('operation');
        $ngo->save();
        $name = $ngo->name;

        $name = $ngo->name;
        foreach($_POST['sector'] as $sector_id){

            DB::table('NGOs_Sector')->insert(
                array('sector_id' => $sector_id, 'NGO_id' =>$id)
            );

            Logs::create(array(
                "user_id"=>  Auth::user()->id,
                "action"  =>"Add Sector ".Sector::find($sector_id)->sector_name." to NGO nammed ".$name
            ));


        }


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
        $name = $ngo->name;
        $ngo->delete();

        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Delete NGO nammed ".$name
        ));
	}


}
