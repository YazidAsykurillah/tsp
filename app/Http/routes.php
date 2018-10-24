<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('select2UserToSetPIC', 'UserController@select2UserToSetPIC');
Route::resource('user', 'UserController');

//Item
Route::get('select2Item', 'ItemController@select2Item');
Route::post('item/delete', 'ItemController@delete');
Route::resource('item', 'ItemController');

//Issue
Route::post('issue/repairment/complete', 'IssueController@completeRepairment');
Route::post('issue/repairment/create', 'IssueController@registerRepairment');
Route::post('issue/delete', 'IssueController@delete');
Route::resource('issue', 'IssueController');

//Datatables
Route::controller('datatables', 'DatatablesController',[
	'getItems'=>'datatables.getItems',
	'getIssues'=>'datatables.getIssues',
]);