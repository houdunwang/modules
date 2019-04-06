<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduBlog;
use Modules\Edu\Repositories\BlogRepository;

class BlogController extends Controller
{
    public function index(BlogRepository $repository)
    {
        $blogs = $repository->paginate(12);
        return view('edu::front.blog.index', compact('blogs'));
    }

    public function show(EduBlog $blog)
    {
        return view('edu::front.blog.show', compact('blog'));
    }
}
