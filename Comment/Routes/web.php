<?php
/*
|--------------------------------------------------------------------------
| 后台管理: 后台管理员操作的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'comment/admin',
    'as' => 'comment.admin.',
    'namespace' => 'Admin',
    'middleware' => ['module'],
], function () {
});
/*
|--------------------------------------------------------------------------
| 会员中心: 会员中心使用的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'comment/member',
    'as' => 'comment.member.',
    'namespace' => 'Member',
    'middleware' => ['member'],
], function () {

});
/*
|--------------------------------------------------------------------------
| 前台路由: 前台会员浏览使用，如果需要用户登录检测请添加auth中间件
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'comment/front',
    'as' => 'comment.front.',
    'namespace' => 'Front',
    'middleware' => ['front'],
], function () {
    Route::resource('content', 'ContentController');
    Route::get('home','HomeController@index')->name('home');
});