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
    Route::any('topic-search', 'TopicController@search')->name('topic.search');
    Route::resource('sign', 'SignController');
    Route::resource('lesson', 'LessonController');
    Route::any('lesson-search', 'LessonController@search')->name('lesson.search');
    Route::get('buy/lesson/{lesson}', 'LessonBuyController@make')->name('buy.lesson');
    Route::get('lesson-recommend/{lesson}', 'LessonController@recommend')->name('lesson.recommend');
    Route::get('tag/{tag}', 'LessonController@tag')->name('lesson.tag');
    Route::resource('video', 'VideoController');
    Route::any('video-search', 'VideoController@search')->name('video.search');
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
    Route::get('favorite', 'UserController@favorite')->name('favorite');
    Route::get('favorite-lesson', 'UserController@favoriteLesson')->name('favorite.lesson');
    Route::get('favorite-video', 'UserController@favoriteVideo')->name('favorite.video');
    Route::get('lesson', 'UserController@lesson')->name('lesson');
    Route::get('follower', 'UserController@follower')->name('follower');
    Route::get('fans', 'UserController@fans')->name('fans');
});