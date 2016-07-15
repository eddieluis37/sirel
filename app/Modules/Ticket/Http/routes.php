<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'ticket'], function() {
	Route::get('/', function() {
		dd('This is the Ticket module index page.');
	});
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'ticket', 'middleware' => ['web']], function () {
	//
});



// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {

    // Ticket routes
    Route::group(['prefix' => 'ticket'], function () {
        Route::get('all_importances',   ['as' => './importances.all_importances',     'uses' => 'ImportanceController@index']);
        Route::get('methodName',        ['as' => 'ticket.method_name',         'uses' => 'TicketController@methodName']);
        Route::get('create',            ['as' => 'ticket.create',              'uses' => 'TicketController@create']);
        Route::post('store',            ['as' => 'ticket.store',               'uses' => 'TicketController@store']);
        Route::delete('destroy',        ['as' => 'ticket.destroy',             'uses' => 'TicketController@destroy']);


    }); // End of Ticket group

    //  routes
    Route::group(['prefix' => 'importances'], function () {


    }); // End of Ticket group






}); // end of AUTHORIZE middleware group

Route::resource('/api/tickets', 'ApiTicketController');

// Route::resource('ticket/section/all_sections', 'SectionController');