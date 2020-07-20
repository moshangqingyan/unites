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
Route::get('web/volunteer/{id?}', "IndexController@volunteer");//志愿活动
Route::get('web/dynamic/{id?}', "IndexController@dynamic");//最新动态
Route::get('web/article/{id?}', "IndexController@article");//文化
Route::get('web/product/{id?}', "IndexController@product");//产品
Route::get('web/policy/{id?}', "IndexController@policy");//政策
Route::get('web/notice/{id?}', "IndexController@notice");//通知公告
Route::get('web/donation/{id}', "IndexController@donation");//捐赠
Route::get('web/thumbs/', "IndexController@thumbs");//点赞列表
Route::get('web/user/thumb', "IndexController@thumb");//用户点赞
//Route::get('web/memorabilia/', "MimeController@memorabilia");//大事记
Route::get('web/user-center/{id?}', "MimeController@userCenter");//我的

Route::get('web/mime/red-list/{id?}', "MimeController@redList");//红榜
Route::get('web/mime/black-list/{id?}', "MimeController@blackList");//黑榜
Route::get('web/mime/integral-loss/', "MimeController@integralLoss");//扣除
Route::get('web/mime/integral-get/', "MimeController@integralGet");//获得
Route::get('web/index/rank/', "MimeController@rank");//排名
Route::get('web/mime/notes/', "MimeController@myNotes");//使用记录


Route::get('web/user/sign/', "IndexController@sign");//使用记录
Route::post('web/AjaxUpload', "IndexController@AjaxUpload");//使用记录
Route::match(['get', 'post'],'web/save/thumb/', "IndexController@save");//使用记录
Route::match(['post', 'get'], 'web/sign-up/{id}', "IndexController@signUp");//报名