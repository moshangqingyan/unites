<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('accounts', AccountController::class);
    $router->resource('integrals', IntergralController::class);
    $router->resource('memorabilia', MemorabiliaController::class);
    $router->resource('volunteers', VolunteerController::class);
    $router->resource('signs', SignController::class);
    $router->resource('red-or-blacks', RankController::class);
    $router->resource('dynamics', DynamicController::class);
    $router->resource('thumbs', ThumbController::class);
    $router->resource('notices', NoticeController::class);
    $router->resource('articles', ArticleController::class);
    $router->resource('activities', ActivityController::class);
    $router->resource('receptions', ReceptionController::class);

});
