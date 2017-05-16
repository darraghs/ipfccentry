<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entry', 'ClubEntryController@index')->name('entry');
Route::get('/entry/status', 'ClubEntryController@entrystatus')->name('entrystatus');
Route::get('/monopanel', 'ClubEntryController@monopanel')->name('monopanel');
Route::get('/colourpanel', 'ClubEntryController@colourpanel')->name('colourpanel');
Route::post('/entry/create','ClubEntryController@create')->name('entrycreate');
Route::post('/entry/panel','ClubEntryController@panel')->name('panelcreate');
Route::post('/entry/update','ClubEntryController@update')->name('panelupdate');
Route::post('/entry/updateAuthor','ClubEntryController@updateAuthor')->name('updateAuthor');
Route::post('/entry/updateTitle','ClubEntryController@updateTitle')->name('updateTitle');
Route::post('/entry/fileUpload', 'ClubEntryController@fileUpload')->name('fileUpload');
Route::get('/payment','ClubEntryController@payment')->name('payment');


Route::get('/admin/status','ClubEntryController@status')->name('clubstatus');
Route::get('/admin/users','UserApprovalController@index')->name('userapproval');
Route::post('/admin/approveUser','UserApprovalController@approveUser')->name('approveUser');
Route::post('/admin/setAdmin','UserApprovalController@setAdmin')->name('setAdmin');


Route::post('/admin/setPaid/{clubid}/{method}', 'AdminClubEntryController@setPaid')->name('setPaid');
Route::get('/admin/checkClubPanel/{clubid}', 'AdminClubEntryController@checkClubPanels')->name('checkClubPanel');
Route::get('/admin/showColourPanel/{clubid}', 'AdminClubEntryController@showColourPanel')->name('showColourPanel');


Route::get('/admin/scoring/{type}/{judge}','AdminScoringController@scoring')->name('adminscoring');
Route::post('/admin/setScore','AdminScoringController@setScore')->name('setScore');
Route::get('/admin/showAdminResults','AdminResultsController@showAdminResults')->name('showAdminResults');


Route::get('/results/showOverallResults','AdminResultsController@showOverallResults')->name('showOverallResults');
Route::get('/results/showStandings','AdminResultsController@showStandings')->name('showStandings');
Route::get('/results/showIndividualScores','AdminResultsController@showIndividualScores')->name('showIndividualScores');
Route::get('/results/showPanelScores/{clubid}','AdminResultsController@showIndividualScores')->name('showPanelScores');
Route::get('/results/getPDFResults/{clubid}','AdminResultsController@getPDFResults')->name('getPDFResults');



Route::get('/admin/colourwinners','AdminResultsController@colourwinners')->name('colourwinners');
Route::get('/admin/monowinners','AdminResultsController@monowinners')->name('monowinners');

Route::post('/admin/setawards','AdminResultsController@setawards')->name('setawards');
Route::get('/admin/clubstatus','AdminClubEntryController@status')->name('clubstatus');


Auth::routes();

