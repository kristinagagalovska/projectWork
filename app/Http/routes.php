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

Route::get('/adminPanel', 'AdminController@index')->name('adminPanel');
Route::get('/allUsers', 'AdminController@allUsers')->name('allUsers');
Route::post('/allUsers', 'AdminController@setPosition')->name('setPosition');

Route::get('/allCompanies', 'CompanyController@all')->name('allCompanies');

Route::get('/createCompany', 'CompanyController@create')->name('createCompany');
Route::post('/storeCompany', 'CompanyController@store')->name('storeCompany');

Route::get('/editCompany/{id}', 'CompanyController@edit')->name('editCompany');
Route::post('/updateCompanyName', 'CompanyController@updateName')->name('updateCompanyName');
Route::post('/updateCompanyLogo', 'CompanyController@updateLogo')->name('updateCompanyLogo');

Route::delete('/deleteCompany/{id}', 'CompanyController@delete')->name('deleteCompany');





