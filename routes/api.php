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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$groupData = [
    'namespace' => '\App\Http\Controllers',
    'prefix' => 'db/',
];

Route::group($groupData, function() {
    //City
    $cityMethods = ['index', 'show'];
    $pointMethods = ['index', 'show'];
    $carMethods = ['index', 'show'];
    //$methodComment = [ 'store', 'create', 'edit', 'update', 'destroy', 'show'];
    Route::resource('city','CityController')->only($cityMethods)->names('api.db.city');
    Route::resource('point','PointController')->only($pointMethods)->names('api.db.point');
    Route::resource('car','CarModelController')->only($carMethods)->names('api.db.car');
});
