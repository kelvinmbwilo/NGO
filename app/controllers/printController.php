<?php

class printController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	}

    public function printNGOReport($id){

        $report = AnnualReport::find($id);
        $pdf = App::make('dompdf');
        $pdf->loadHTML(View::make('NGO.reports.pdf',compact("report")))->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream();
    }
    public function printSectorReport($nid,$id){

        $report = SectorAnnualReport::find($id);
        $NGOs = NGOs::find($nid);

        $pdf = App::make('dompdf');
        $pdf->loadHTML(View::make('NGO.sectors.reports.pdf',compact(array("report","NGOs"))))->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream();
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
