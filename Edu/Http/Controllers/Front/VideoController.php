<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduVideo;
use Modules\Edu\Repositories\UserVideoRepository;
use Modules\Edu\Repositories\VideoRepository;
use Modules\Edu\Services\UserService;

/**
 * 前台视频
 * Class VideoController
 * @package Modules\Edu\Http\Controllers\Front
 */
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['show']]);
    }

    /**
     * 更新列表
     * @param VideoRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(VideoRepository $repository)
    {
        $videos = $repository->paginate(18, ['*'], 'id');
        return view('edu::front.video.index', compact('videos'));
    }

    /**
     * 视频搜索
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $word = $request->query('query', request()->input('word'));
        $videos = EduVideo::searchByLike($word)->paginate(15);
        return view('edu::front.video.search', compact('videos'));
    }

    /**
     * 播放视频
     * @param EduVideo $video
     * @param UserVideoRepository $userVideoRepository
     * @param VideoRepository $videoRepository
     * @param UserService $userService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Exception
     */
    public function show(
        EduVideo $video,
        UserVideoRepository $userVideoRepository,
        VideoRepository $videoRepository,
        UserService $userService
    ) {
        if (!$userService->canPlayVideo($video, auth()->user())) {
            return redirect(route('edu.front.subscribe.index'));
        }
        $videos = $videoRepository->getALlByLesson($video->lesson);
        $userVideoRepository->record($video, auth()->user());
        return view('edu::front.video.show', compact('video', 'videos'));
    }
}
