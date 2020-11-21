<?php

use App\Supermarket;
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

//****SUPERMARKET ROUTES V1 */
Route::get('supermarket', 'Supermarkets@index');
Route::get('supermarket/{id}', 'Supermarkets@show');
Route::post('supermarket', 'Supermarkets@store');
Route::put('supermarket/{id}', 'Supermarkets@update');
Route::delete('supermarket/{id}', 'Supermarkets@destroy');

/**Auth Code V1*/
//Route::middleware('auth:api')->get('supermarket', 'Supermarkets@index');

//Route::apiResource('supermarket', 'Supermarkets');

//**USER LOGIN ROUTES V1 */
Route::post('login', 'Login@login');
Route::post('register', 'Login@register');

//***ITEMS ROUTES V1 */
Route::get('item', 'Items@index');
Route::get('item/{id}', 'Items@show');
Route::post('item', 'Items@store');
Route::put('item/{id}', 'Items@update');
Route::delete('item/{id}', 'Items@destroy');

//**ORDER ROUTES */
Route::get('order', 'Orders@index');
Route::get('order/{id}', 'Orders@show');
//Route::post('order', 'Orders@store');
Route::put('order/{id}', 'Orders@update');
Route::delete('order/{id}', 'Orders@destroy');

Route::middleware('auth:api')->post('order', 'Orders@store');

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::apiResource('supermarket', 'Supermarkets');
// });
