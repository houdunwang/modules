<?php
/*
|--------------------------------------------------------------------------
| 后台管理: 后台管理员操作的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'edu/admin',
    'as' => 'edu.admin.',
    'namespace' => 'Admin',
    'middleware' => ['module'],
], function () {
    Route::resource('tag', 'TagController');
    Route::resource('lesson', 'LessonController');
    Route::resource('subscribe', 'SubscribeController');
});
/*
|--------------------------------------------------------------------------
| 会员中心: 会员中心使用的动作
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'edu/member',
    'as' => 'edu.member.',
    'namespace' => 'Member',
    'middleware' => ['member'],
], function () {
    Route::resource('duration', 'DurationController');
});
/*
|--------------------------------------------------------------------------
| 前台路由: 前台会员浏览使用，如果需要用户登录检测请添加auth中间件
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'edu/front',
    'as' => 'edu.front.',
    'namespace' => 'Front',
    'middleware' => ['front'],
], function () {
    //主页
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('topic', 'TopicController');
    Route::get('topic-recommend/{topic}', 'TopicController@recommend')->name('topic.recommend');
    Route::resource('sign', 'SignController');
    Route::resource('lesson', 'LessonController');
    Route::get('lesson-recommend/{lesson}', 'LessonController@recommend')->name('lesson.recommend');
    Route::get('tag/{tag}', 'LessonController@tag')->name('lesson.tag');
    Route::resource('video', 'VideoController');
    Route::get('setup', 'LessonController@setup');
    Route::resource('live', 'LiveController');
    Route::get('exam/{video}', 'ExamController@show')->name('exam.show')
        ->middleware('auth');
    Route::post('exam/{video}', 'ExamController@store')->name('exam.store')
        ->middleware('auth');
    Route::resource('subscribe', 'SubscribeController');
});

/*
|--------------------------------------------------------------------------
| 个人空间
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'edu/front/user',
    'as' => 'edu.front.user.',
    'namespace' => 'Front',
    'middleware' => ['front'],
], function () {
    Route::get('activity', 'UserController@activity')->name('activity');
    Route::get('topic', 'UserController@topic')->name('topic');
});