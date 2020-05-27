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

use Illuminate\Http\Request;

Route::view('/', 'home');

/*
Route::get('/submit', function () {
    return view('submit');
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
    'title' => 'required|max:255',
    'url' => 'required|url|max:255',
    'description' => 'required|max:255',
	]);

	$link = new \App\Link;
	$link->title = $data['title'];
	$link->url = $data['url'];
	$link->description = $data['description'];

	// Save the model
	$link->save();
});


Route::name('web_path')->get('/', 'HomeController@index');

Auth::routes();

Route::get('/create', 'HomeController@create')->name('create_web_path');

Route::name('store_web_path')->post('/', 'HomeController@store');

Route::name('web_path')->get('/{id}', 'HomeController@show');

Route::name('edit_web_path')->get('/{id}/edit', 'HomeController@edit');
Route::name('update_web_path')->put('/{id}', 'HomeController@update');
Route::name('delete_web_path')->delete('/{id}', 'HomeController@destory');







*/

Route::name('blogs.index')->get('blogs', 'BlogsController@index');
Route::name('blogs.create')->get('blogs/create', 'BlogsController@create');
Route::name('blogs.store')->post('blogs', 'BlogsController@store');

Route::name('blogs.show')->get('blogs/{blog}', 'BlogsController@show');
Route::name('blogs.edit')->get('blogs/{blog}/edit', 'BlogsController@edit');
Route::name('blogs.update')->patch('blogs/{blog}', 'BlogsController@update');
Route::name('blogs.destory')->delete('blogs/{blog}', 'BlogsController@destory');


Auth::routes();

Route::get('contact','ContactFormController@create')->name('contact.create');
Route::post('contact','ContactFormController@store')->name('contact.store');
Route::get('customers/create','CustomersController@create')->name('customer.create');
Route::post('customers','CustomersController@store')->name('customer.store');
Route::get('customers', 'CustomersController@index')->name('customer.index');
Route::get('customers/{customer}', 'CustomersController@show')->name('customer.show');
Route::get('customers/{customer}/edit', 'CustomersController@edit')->name('customer.edit');
Route::patch('customers/{customer}', 'CustomersController@update')->name('customer.update');
Route::delete('customers/{customer}', 'CustomersController@destory')->name('customer.destory');

