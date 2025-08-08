<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/apis', fn() => \DagaSmart\BizAdmin\Admin::view(config('apis.admin.route.prefix')));

//需登录与鉴权
Route::group([
    'as'         => 'apis',
    'domain'     => config('apis.admin.route.domain'),
    'prefix'     => config('apis.admin.route.prefix'),
    'middleware' => config('apis.admin.route.middleware'),
], function (Router $router) {
    $router->resource('dashboard', \Modules\Apis\Controllers\HomeController::class);
    $router->resource('system/settings', \Modules\Apis\Controllers\SettingController::class);
});

//免登录无限制
Route::group([
    'as'         => 'apis',
    'domain'     => config('apis.admin.route.domain'),
    'prefix'     => config('apis.admin.route.prefix'),
], function (Router $router) {
    $router->get('_iconify_search', [\DagaSmart\BizAdmin\Controllers\IndexController::class, 'iconifySearch']);

});
