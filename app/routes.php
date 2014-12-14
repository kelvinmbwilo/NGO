<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::get('home', function()
{
	return View::make('dashboard');
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing user actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//validating user during login
Route::post('login',array('as'=>'login', 'uses'=>'UserController@validate'));

//logging a user out
Route::get('logout',array('as'=>'logout', 'uses'=>'UserController@logout'));

//display a form to add new user
Route::get('user/add',array('as'=>'adduser', 'uses'=>'UserController@create'));

//display a list of users
Route::get('user/list',array('uses'=>'UserController@userlist'));

//adding new user
Route::post('user/add',array('as'=>'adduser1', 'uses'=>'UserController@store'));

//viewing list of users
Route::get('users',array('as'=>'listuser', 'uses'=>'UserController@index'));

//display a form to edit users information
Route::get('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@edit'));

//editng users information
Route::post('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@update'));

//deleting user
Route::post('user/delete/{id}',array('as'=>'deleteuser', 'uses'=>'UserController@destroy'));

//display a system usage log for a user
Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));

//check for a regions district...
Route::post('user/region_check/{id}',array('uses'=>'UserController@check_region'));

//check for a regions district...
Route::post('user/region_check1/{id}',array('uses'=>'UserController@check_region1'));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing NGOS actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a form to add new ngo
Route::get('ngo/add',array('as'=>'adduser', 'uses'=>'NGOController@create'));

//display a list of ngos
Route::get('ngo/list',array('uses'=>'NGOController@ngolist'));

//adding new ngo
Route::post('ngo/add',array('as'=>'addngo1', 'uses'=>'NGOController@store'));

//viewing list of ngos
Route::get('ngos',array('as'=>'listngo', 'uses'=>'NGOController@index'));
Route::get('ngoJsonAll',array('as'=>'json', 'uses'=>'NGOController@ngoJsonAll'));
Route::get('ngoJsonMult',array('as'=>'json', 'uses'=>'NGOController@ngoJsonMult'));
Route::get('ngoJsonSingle',array('as'=>'json', 'uses'=>'NGOController@ngoJsonSingle'));

//display a form to edit ngo information
Route::get('ngo/edit/{id}',array('as'=>'editngo', 'uses'=>'NGOController@edit'));

//display
Route::get('ngo/members/{id}',array('as'=>'o', 'uses'=>'NGOController@listmembers'));
Route::get('ngo/{id}/sector/prioritysectors',array('as'=>'o', 'uses'=>'NGOController@listPrioritySectors'));

//editng ngo information
Route::post('ngo/edit/{id}',array('as'=>'editngo1', 'uses'=>'NGOController@update'));

//deleting ngo
Route::post('ngo/delete/{id}',array('as'=>'deletengo', 'uses'=>'NGOController@destroy'));

//display a system usage log for a ngo
//Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing yearly report actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a form to add new ngo
Route::get('ngo/report/add',array('uses'=>'ReportsController@create'));

//display a list of ngos
Route::get('report/list',array('uses'=>'ReportsController@reportlist'));

//adding new ngo
Route::post('report/add',array('as'=>'addngo1', 'uses'=>'NGOController@store'));

//viewing list of ngos
Route::get('reports',array('as'=>'listngo', 'uses'=>'ReportsController@index'));

Route::get('printngoreports/{id}',array('as'=>'printngo','uses'=>'printController@printNGOReport'));
Route::get('printsectorreports/{nid}/{id}',array('as'=>'printsector','uses'=>'printController@printSectorReport'));

//display a form to edit ngo information
Route::get('ngo/edit/{id}',array('as'=>'editngo', 'uses'=>'NGOController@edit'));

//display
Route::get('ngo/members/{id}',array('as'=>'o', 'uses'=>'NGOController@listmembers'));

//editng ngo information
Route::post('ngo/edit/{id}',array('as'=>'editngo1', 'uses'=>'NGOController@update'));

//deleting ngo
Route::post('ngo/delete/{id}',array('as'=>'deletengo', 'uses'=>'NGOController@destroy'));

//display a system usage log for a ngo
//Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing NGOS Members actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a form to add new ngo member
Route::get('ngo/{id}/member/add',array('uses'=>'MembersController@create'));

//display a list of ngo members
Route::get('ngo/{id}/member/list',array('uses'=>'MembersController@memberlist'));

//adding new ngo member
Route::post('ngo/{id}/member/add',array('uses'=>'MembersController@store'));

//viewing list of members of particular ngo
Route::get('ngo/{id}/member',array('uses'=>'MembersController@index'));

//display a form to edit ngo member information
Route::get('ngo/{id}/member/edit/{member_id}',array('uses'=>'MembersController@edit'));

//editing ngo member information
Route::post('ngo/{id}/member/edit/{member_id}',array('uses'=>'MembersController@update'));

//deleting ngo member
Route::post('ngo/{id}/member/delete/{member_id}',array('uses'=>'MembersController@destroy'));


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing NGOS Employee/Bearer actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a form to add new ngo member
Route::get('ngo/{id}/bearer/add',array('uses'=>'EmployeeController@create'));

//display a list of ngo members
Route::get('ngo/{id}/bearer/list',array('uses'=>'EmployeeController@bearerlist'));

//adding new ngo bearer
Route::post('ngo/{id}/bearer/add',array('uses'=>'EmployeeController@store'));

//viewing list of bearers of particular ngo
Route::get('ngo/{id}/bearer',array('uses'=>'EmployeeController@index'));

//display a form to edit ngo bearer information
Route::get('ngo/{id}/bearer/edit/{bearer_id}',array('uses'=>'EmployeeController@edit'));

//editing ngo bearer information
Route::post('ngo/{id}/bearer/edit/{bearer_id}',array('uses'=>'EmployeeController@update'));

//deleting ngo bearer
Route::post('ngo/{id}/bearer/delete/{bearer_id}',array('uses'=>'EmployeeController@destroy'));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing NGOS Yearly Reports actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a form to add new ngo member
Route::get('ngo/{id}/report/add',array('uses'=>'NGOReportController@create'));

//display a list of ngo reports
Route::get('ngo/{id}/report/list',array('uses'=>'NGOReportController@reportlist'));


//adding new ngo report
Route::post('ngo/{id}/report/add',array('uses'=>'NGOReportController@store'));

//viewing list of reports of particular ngo
Route::get('ngo/{id}/report',array('uses'=>'NGOReportController@index'));

//viewing list of reports of particular ngo
Route::get('ngo/{id}/summary',array('uses'=>'NGOReportController@summary'));


//viewing list of reports of particular ngo
Route::get('ngo/report/{id}',array('uses'=>'NGOReportController@show'));

//display a form to edit ngo report information
Route::get('ngo/{id}/report/edit/{report_id}',array('uses'=>'NGOReportController@edit'));

//editing ngo report information
Route::post('ngo/{id}/report/edit/{report_id}',array('uses'=>'NGOReportController@update'));

//deleting ngo report
Route::post('ngo/report/delete/{report_id}',array('uses'=>'NGOReportController@destroy'));

//deleting ngo report
Route::post('getreport',array('uses'=>'NGOStastisticController@index'));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing Statistical reports
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//display a form to add new ngo member
Route::get('statistics',array('uses'=>'StatisticsController@index'));

//display a best practices
Route::get('practices',array('uses'=>'StatisticsController@show'));


/**
 * Managing Sectors
 */

Route::get('addSector',array('as'=>'addSector', 'uses'=>'SECTORController@create'));
Route::get('addSector/{id}',array('as'=>'addSector', 'uses'=>'SECTORController@createForNg'));
Route::get('sectorJson',array('as'=>'sectorJson', 'uses'=>'SECTORController@sectorJson'));
Route::post('sector/add',array('as'=>'sectorAdd', 'uses'=>'SECTORController@store'));
Route::post('sector/add/{id}',array('as'=>'ndsectorAdd', 'uses'=>'SECTORController@storeForNg'));
Route::get('sector/edit/{id}',array('as'=>'sectorEdit', 'uses'=>'SECTORController@edit'));
Route::post('sector/edit/{id}',array('as'=>'sectorEdit', 'uses'=>'SECTORController@update'));
Route::get('sectors',array('as'=>'sectorlist', 'uses'=>'SECTORController@sectorlist'));
Route::post('sector/delete/{id}',array('as'=>'sectorDelete', 'uses'=>'SECTORController@destroy'));
Route::get('sector/{id}/deleteuser/{nid}',array('as'=>'sectorDelete', 'uses'=>'SECTORController@destroyngSector'));
Route::get('sector/{id}/goodpractises/{nid}',array('as'=>'sectorGoodpractises', 'uses'=>'SECTORController@goodpractises'));
Route::get('sector/{id}/report/{nid}',array('as'=>'sectorReport', 'uses'=>'SECTORController@sectorReport'));


//display a form to add new ngo member
Route::get('sector/{id}/report/{nid}/add',array('uses'=>'SECTORReportController@create'));
//adding new ngo report
Route::post('sector/{id}/report/{nid}/sum',array('uses'=>'SECTORReportController@store'));

//display a list of ngo reports
Route::get('ngo/{nid}/sector/{id}/report/',array('uses'=>'SECTORReportController@reportlist'));

Route::get('ngo/{nid}/sector/{id}/report_',array('uses'=>'SECTORReportController@index'));


//viewing list of reports of particular ngo
Route::get('ngo/{nid}/sector/report/{id}',array('uses'=>'SECTORReportController@show'));
//viewing financial report
Route::get('financial',array('uses'=>'NGOStastisticController@financial'));
//deleting ngo report
Route::post('ngo/sector/report/delete/{report_id}',array('uses'=>'SECTORReportController@destroy'));
