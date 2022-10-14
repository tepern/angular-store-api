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

Route::get('/', function () {
    return view('welcome');
});

$groupData = [
    'namespace' => '\App\Http\Controllers',
    'prefix' => 'test/',
];

Route::group($groupData, function() {
    //City
    $cityMethods = ['index', 'show'];
    $pointMethods = ['index', 'show'];
    $carMethods = ['index', 'show'];
    $rateMethods = ['index', 'show'];
    
    Route::resource('city','CityController')->only($cityMethods)->names('api.db.city');
    Route::resource('point','PointController')->only($pointMethods)->names('api.db.point');
    Route::resource('car','CarModelController')->only($carMethods)->names('api.db.car');
    Route::resource('rate','RateController')->only($rateMethods)->names('api.db.rate');
});
