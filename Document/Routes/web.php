<?php
/*
|--------------------------------------------------------------------------
| 后台管理: 后台管理员操作的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'document/admin',
    'as' => 'document.admin.',
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
    'prefix' => 'document/member',
    'as' => 'document.member.',
    'namespace' => 'Member',
    'middleware' => ['member'],
], function () {
    Route::resource('article', 'ArticleController');
    Route::resource('content', 'ContentController');
    Route::post('content-rename/{content}', 'ContentController@rename')->name('content.rename');
    Route::resource('menu', 'MenuController');
});
/*
|--------------------------------------------------------------------------
| 前台路由: 前台会员浏览使用，如果需要用户登录检测请添加auth中间件
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'document/front',
    'as' => 'document.front.',
    'namespace' => 'Front',
    'middleware' => ['front'],
], function () {
    //主页
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('article', 'ArticleController');
    Route::resource('content', 'ContentController');
});