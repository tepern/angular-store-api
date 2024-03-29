<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('cities', CityController::class);
    $router->resource('car-models', CarModelController::class);
    $router->resource('category-ids', CategoryIdController::class);
    $router->resource('rates', RateController::class);
    $router->resource('rate-types', RateTypeController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('order-statuses', OrderStatusController::class);
});
