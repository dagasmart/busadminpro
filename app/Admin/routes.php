<?php

use App\Admin\Controllers\TestController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/admin', fn() => \DagaSmart\BizAdmin\Admin::view());

//需登录与鉴权
Route::group([
    'domain'     => config('admin.route.domain'),
    'prefix'     => config('admin.route.prefix'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->resource('dashboard', \App\Admin\Controllers\HomeController::class);
    $router->resource('system/settings', \App\Admin\Controllers\SettingController::class);
});

//免登录无限制
Route::group([
    'domain'     => config('admin.route.domain'),
    'prefix'     => config('admin.route.prefix'),
], function (Router $router) {
    $router->get('_iconify_search', [\DagaSmart\BizAdmin\Controllers\IndexController::class, 'iconifySearch']);

    $router->get('/test/index', [TestController::class, 'index']);

});
