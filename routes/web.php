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
use Illuminate\Http\Request;

// Route::get('sesstionlaravel', function(Request $request){
// 	$request->session()->put('session1','nguyen van a');
// 	//$sessionOne = $request->session()->get('session1');
// 	//dd($sessionOne);
// 	$all = $request->session()->all();
// 	dump($all);
// 	dump($request->session()->has('session1'));
// });

Route::namespace('Frontend')->group(function(){
	Route::get('/','HomeController@index')->name('frontend.home');

	Route::get('gio-hang', 'CartController@index')
        ->name('cart.index');

	Route::get('cart/{productId}','CartController@store')->name('cart.store');

	Route::post('cart/update','CartController@update')
		->name('cart.update');

	Route::get('cart/remove-product/{productId}','CartController@destroy')->name('cart.destroy');

	Route::post('cart/checkout','CartController@checkout')->name('cart.checkout');

	Route::get('product/show/{id}','ProductController@show')->name('product.show');

	Route::get('{slug}','CategoryController@show')->name('frontend.category.show');
	


});
// Route::get('/', function () {
//     return view('exam1');
// });

// Route::get('suntech', function(){
// 	return 'hoc lap trinh';
// });
// Route::get('suntech/{id}',function($id=null){
// 	return " bai viet co ID la ${id}";
// }) ->where('id','[0-9]+');

// Route::middleware('backend.auth')->prefix('backend')->group(function(){

// 		Route::get('/',function(){
// 			return view('backend');
// 		})->name('backend.index');

// 		Route::get('product',function(){
// 			return view('form_product');
// 		})->name('product.index');


// 		Route::post('product/store',function(){
// 			return 'Product Store';
// 		})->name('product.store');

// 		Route::put('product/put',function(){
// 			return 'Product Puts';
// 		})->name('product.put');

// 		Route::delete('product/delete',function(){
// 			return 'Product Delete';
// 		})->name('product.delete');





// 		Route::get('category',function(){
// 			return 'Category page';
// 		})->name('category.index');

// 		Route::get('new',function(){
// 			return 'News page';
// 		})->name('new.index');

// 		Route::get('user',function(){
// 			return 'User page';
// 		})->name('user.index');

// });
 

                     //***
// Route::get('product','ProductController@index');
// Route::get('product/create','ProductController@create');


// Route::namespace('Backend')->prefix('backend')->group(function(){
// 	Route::get('product', 'ProductController@index');
// 	Route::get('category', 'CategoryController@index');
// });
