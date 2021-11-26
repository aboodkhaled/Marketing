<?php

use Illuminate\Support\Facades\Route;

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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ], function () {
    define('PAGINATION_COUNT',1000000);
    Route::group(['namespace' => 'admin', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function(){
      Route::get('/', 'DashboardController@index') -> name('admin.dashboard');


      Route::group(['prefix' => 'cuontries'  ], function () {
        Route::get('/', 'CuontryController@index')->name('admin.cuontries.index');
        Route::get('/create', 'CuontryController@create')->name('admin.cuontries.create');
        Route::post('/store', 'CuontryController@store')->name('admin.cuontries.store');
        Route::get('edit/{id}', 'CuontryController@edit') -> name('admin.cuontries.edit');
          Route::post('/update', 'CuontryController@update') -> name('admin.cuontries.update');
          Route::post('/delete', 'CuontryController@destroy') -> name('admin.cuontries.delete');
      });
      Route::group(['prefix' => 'cities'  ], function () {
        Route::get('/', 'CityController@index')->name('admin.cities.index');
        Route::get('/create', 'CityController@create')->name('admin.cities.create');
        Route::post('/store', 'CityController@store')->name('admin.cities.store');
        Route::get('edit/{id}', 'CityController@edit') -> name('admin.cities.edit');
          Route::post('/update', 'CityController@update') -> name('admin.cities.update');
          Route::post('/delete', 'CityController@destroy') -> name('admin.cities.delete');
      });
      Route::group(['prefix' => 'serves'  ], function () {
        Route::get('/', 'ServeController@index')->name('admin.serves.index');
        Route::get('/create', 'ServeController@create')->name('admin.serves.create');
        Route::post('/store', 'ServeController@store')->name('admin.serves.store');
        Route::get('edit/{id}', 'ServeController@edit') -> name('admin.serves.edit');
          Route::post('/update', 'ServeController@update') -> name('admin.serves.update');
          Route::post('/delete', 'ServeController@destroy') -> name('admin.serves.delete');
      });
      Route::group(['prefix' => 'serve_ps'  ], function () {
        Route::get('/', 'ServePController@index')->name('admin.serve_ps.index');
        Route::get('/create', 'ServePController@create')->name('admin.serve_ps.create');
        Route::post('/store', 'ServePController@store')->name('admin.serve_ps.store');
        Route::get('edit/{id}', 'ServePController@edit') -> name('admin.serve_ps.edit');
          Route::post('/update', 'ServePController@update') -> name('admin.serve_ps.update');
          Route::post('/delete', 'ServePController@destroy') -> name('admin.serve_ps.delete');
      });

      Route::group(['prefix' => 'items'  ], function () {
        Route::get('/', 'ItemController@index')->name('admin.items.index');
        Route::get('/create', 'ItemController@create')->name('admin.items.create');
        Route::post('/store', 'ItemController@store')->name('admin.items.store');
        Route::get('edit/{id}', 'ItemController@edit') -> name('admin.items.edit');
          Route::post('/update', 'ItemController@update') -> name('admin.items.update');
          Route::post('/delete', 'ItemController@destroy') -> name('admin.items.delete');
      });

      Route::group(['prefix' => 'customars'  ], function () {
        Route::get('/', 'CustomarController@index')->name('admin.customars.index');
        Route::get('/create', 'CustomarController@create')->name('admin.customars.create');
        Route::get('/create_item', 'CustomarController@create_item')->name('admin.customars.create_item');
        Route::post('/store', 'CustomarController@store')->name('admin.customars.store');
        Route::get('show/{id}', 'CustomarController@show') -> name('admin.customars.show');
        Route::get('edit/{id}', 'CustomarController@edit') -> name('admin.customars.edit');
        Route::get('download/{name_file}', 'CustomarController@download') -> name('admin.customars.download');
          Route::post('update/{id}', 'CustomarController@update') -> name('admin.customars.update');
          Route::post('/delete', 'CustomarController@destroy') -> name('admin.customars.delete');
          Route::post('deletee_customar', 'CustomarController@deletee_customar') -> name('admin.customars.deletee_customar');
          Route::post('deletee_item', 'CustomarController@deletee_item') -> name('admin.customars.deletee_item');
          Route::post('upload', 'CustomarController@upload') -> name('admin.customars.upload');
          Route::post('upitem', 'CustomarController@upitem') -> name('admin.customars.upitem');
          Route::post('oke', 'CustomarController@oke') -> name('admin.customars.oke');
      });

      Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RolesController@index')->name('admin.roles.index');
        Route::get('create', 'RolesController@create')->name('admin.roles.create');
        Route::post('store', 'RolesController@saveRole')->name('admin.roles.store');
        Route::get('/edit/{id}', 'RolesController@edit') ->name('admin.roles.edit') ;
        Route::post('update/{id}', 'RolesController@update')->name('admin.roles.update');
     });

     Route::group(['prefix' => 'users'  ], function () {
      Route::get('/', 'UsersController@index')->name('admin.users.index');
      Route::get('/create', 'UsersController@create')->name('admin.users.create');
      Route::post('/store', 'UsersController@store')->name('admin.users.store');
    });
    
  });

  Route::view('add_customar','livewire.show_Form');



  Route::group(['namespace' => 'admin' ,'middlewware' => 'guest:admin', 'prefix' => 'admin'], function(){
    Route::get('/login', 'loginController@getlogin') -> name('get.admin.login');
    Route::post('/login', 'loginController@login') -> name('admin.login');
      
  });

});
