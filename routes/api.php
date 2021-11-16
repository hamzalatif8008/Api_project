<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/userlogin', 'App\Http\Controllers\API\Auth\AuthController@userlogin');
Route::post('/userregister', 'App\Http\Controllers\API\Auth\AuthController@register');
Route::get('/userregister', 'App\Http\Controllers\API\Auth\AuthController@up');
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/userdetails', 'App\Http\Controllers\API\Auth\AuthController@details');
  Route::get('/users', 'App\Http\Controllers\API\UserController@users');
  Route::post('/userchangepassword', 'App\Http\Controllers\API\Auth\AuthController@userchangepassword');
  Route::post('changeAddress', 'App\Http\Controllers\API\Auth\AuthController@userchangeaddress');
});

Route::post('/userforgetpassword', 'App\Http\Controllers\API\Auth\AuthController@userforgetpassword');
Route::post('/userentercode', 'App\Http\Controllers\API\Auth\AuthController@userentercode');
Route::post('/index', 'App\Http\Controllers\API\FrontendController@index');
Route::get('/getcategories', 'App\Http\Controllers\API\FrontendController@getcategories');
Route::post('/subcategories', 'App\Http\Controllers\API\FrontendController@getsubcategories');
Route::post('/childcategories', 'App\Http\Controllers\API\FrontendController@childcats');
Route::post('/productdetail', 'App\Http\Controllers\API\FrontendController@product');
Auth::routes(['verify' => true]);
Route::get('/getcatpros/{id}', 'App\Http\Controllers\API\ProductController@categorypros');
Route::get('/getsubcatpros/{id}', 'App\Http\Controllers\API\ProductController@subcategorypros');
Route::get('/getchildcatpros/{id}', 'App\Http\Controllers\API\ProductController@childcategorypros');
