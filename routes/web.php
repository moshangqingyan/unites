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

Route::get('web/index/', "IndexController@index");//首页
Route::get('web/volunteer/', "IndexController@volunteer");//志愿活动
Route::get('web/dynamic/', "IndexController@dynamic");//最新动态
Route::get('web/memorabilia/', "MimeController@memorabilia");//大事记
Route::get('web/user-center/', "MimeController@userCenter");//我的
Route::get('web/mime/red-list/', "MimeController@redList");//红榜
Route::get('web/mime/black-list/', "MimeController@blackList");//黑榜
Route::get('web/mime/integral-loss/', "MimeController@integralLoss");//扣除
Route::get('web/mime/integral-get/', "MimeController@integralGet");//获得
Route::get('web/index/rank/', "MimeController@rank");//排名
Route::get('web/mime/notes/', "MimeController@myNotes");//使用记录