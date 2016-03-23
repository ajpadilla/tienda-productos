<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/', function () {
    	return view('layouts.partials._content');
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

Route::group(['middleware' => ['web']], function () {
	
	//Route for products
    Route::get('admin/products', 'ProductController@index');

    //Route for classification
    Route::get('admin/classification', 'ClassificationController@index');
    Route::post('admin/classification/store', 'ClassificationController@store');
    Route::post('admin/classification/update/{id}', 'ClassificationController@update');
    Route::get('admin/classification/delete/{id}', 'ClassificationController@delete');
    Route::get('admin/checkNameClassified', 'ClassificationController@checkName');
    Route::get('admin/listAllClassifieds/{numberItems}', 'ClassificationController@listAll');
    Route::get('admin/getData/{id}', 'ClassificationController@getData');
});
