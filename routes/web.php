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
    'prefix' => 'api/db',
];

Route::group($groupData, function() {
    //City
    $cityMethods = ['index', 'show'];
    //$methodComment = [ 'store', 'create', 'edit', 'update', 'destroy', 'show'];
    //Route::resource('city','CityController')->names('api.db.city');
    //Route::resource('point','PointController')->names('api.db.point');
});
