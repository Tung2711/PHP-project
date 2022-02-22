<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::namespace('Api')->middleware(['api'])->prefix('v1')->group( function ($router) {

    Route::post('login', 'AuthController@login');
    Route::delete('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    // Route::prefix('category')->middleware(['token.valid'])->group(function(){
    // 	Route::get('/','CategoryController@index');
    // 	Route::post('/','CategoryController@store');
    // 	Route::put('update/{id}','CategoryController@update');
    // });

    Route::middleware(['token.valid'])->group(function(){
        Route::resource('category','CategoryController')->except(['edit','create']);

         Route::resource('product','ProductController')->except(['show','edit','create']);

         Route::resource('slider','SliderController')->except(['show','edit','create']);

         Route::post('upload','UploadController@upload')->name('upload');

         Route::resource('order','OrderController')->except(['edit','create']);
    });
    
});



