<?php
/*
|--------------------------------------------------------------------------
| 后台管理: 后台管理员操作的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'article/admin',
    'as' => 'article.admin.',
    'namespace' => 'Admin',
    'middleware' => ['module'],
], function () {
    Route::resource('model', 'ModelController');
    Route::resource('category', 'CategoryController');
});
/*
|--------------------------------------------------------------------------
| 会员中心: 会员中心使用的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'article/member',
    'as' => 'article.member.',
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
    'prefix' => 'article/front',
    'as' => 'article.front.',
    'namespace' => 'Front',
    'middleware' => ['front'],
], function () {
    //主页
    Route::get('/', 'HomeController@index')->name('home');
});
