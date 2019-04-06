<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Repositories\FavoriteRepository;
use App\Servers\ActivityServer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduLesson;
use Modules\Edu\Entities\EduTopic;
use Modules\Edu\Entities\EduUserVideo;
use Modules\Edu\Entities\EduVideo;

/**
 * 个人空间
 * Class UserController
 * @package Modules\Edu\Http\Controllers\Front
 */
class UserController extends Controller
{
    public function activity(ActivityServer $activityServer)
    {
        $user = User::findOrFail(\request('uid'));
        $activities = $activityServer->getByUser($user)->latest()->paginate(15);
        return view('edu::front.user.activity', compact('user', 'activities'));
    }

    public function topic()
    {
        $user = User::findOrFail(\request('uid'));
        $topics = EduTopic::where('user_id', $user['id'])->where('site_id', \site()['id'])->paginate(15);
        return view('edu::front.user.topic', compact('user', 'topics'));
    }

    public function favorite(FavoriteRepository $repository)
    {
        $user = User::findOrFail(\request('uid'));
        $favorites = $repository->lists($user);
        return view('edu::front.user.favorite', compact('user', 'favorites'));
    }

    public function favoriteLesson(FavoriteRepository $repository)
    {
        $user = User::findOrFail(\request('uid'));
        $favorites = $repository->lists($user, 8, EduLesson::class);
        return view('edu::front.user.favorite_lesson', compact('user', 'favorites'));
    }

    public function favoriteVideo(FavoriteRepository $repository)
    {
        $user = User::findOrFail(\request('uid'));
        $favorites = $repository->lists($user, 8, EduVideo::class);
        return view('edu::front.user.favorite_video', compact('user', 'favorites'));
    }

    public function lesson()
    {
        $user = User::findOrFail(\request('uid'));
        $lessonIds = EduUserVideo::where(function ($query) use ($user) {
            $query->where('user_id', $user['id'])->where('site_id', site()['id']);
        })->pluck('lesson_id');
        $lessons = EduLesson::whereIn('id', $lessonIds)->paginate(8);
        return view('edu::front.user.lesson', compact('user', 'lessons'));
    }
}
