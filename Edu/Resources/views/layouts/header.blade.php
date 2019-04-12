<div class="border-bottom border-info header shadow">
    <div class="bg-white border-gray pb-2 pt-2 shadow-sm font-weight-bold">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white pl-0">
                <a class="mr-5 text-info navbar-brand font-weight-bold" href="/">
                    <i class="fa fa-flag"></i> {{config_get('Edu.webname')}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-lg-0">
                        <li class="nav-item dropdown mr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                系统课程
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(\Modules\Edu\Entities\EduLesson::type('system')->get() as $lesson)
                                    <a class="dropdown-item"
                                       href="{{route('edu.front.lesson.show',$lesson)}}">{{$lesson['title']}}</a>
                                    <div class="dropdown-divider"></div>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link {{active_class(if_route_pattern('shop.front.log.index'),'active')}}"
                               href="{{module_link('edu.front.lesson.index')}}">项目实战</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link {{active_class(if_route_pattern('edu.front.video.index'),'active')}}"
                               href="{{module_link('edu.front.video.index')}}">更新列表</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link " href="{{route('edu.front.subscribe.index')}}">订阅会员</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link {{active_class(if_route_pattern('edu.front.topic.*'))}}"
                               href="{{route('edu.front.topic.index')}}">话题讨论</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link " href="{{route('edu.front.sign.index')}}">会员签到</a>
                        </li>
                        @if (module_exists('Document'))
                            <li class="nav-item dropdown mr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    在线文档
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @inject('articleRepository','Modules\Document\Repositories\ArticleRepository')
                                    @foreach($articleRepository->lists() as $article)
                                        <a class="dropdown-item"
                                           href="{{route('document.front.article.show',$article)}}">
                                            {{$article['title']}}
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown mr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                其他功能
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{module_link('edu.front.blog.index')}}">视频日记</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('edu.front.live.index')}}">八点直播</a>
                            </div>
                        </li>
                    </ul>
                    @auth()
                        <ul class="navbar-nav ">
                            @if($notifyCount = auth()->user()->unreadNotifications->count())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('member.notify.index')}}">
                                        消息
                                        <span class="badge badge-success rounded-pill align-top small"> {{$notifyCount}}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right rounded-0"
                                     aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('member')}}">修改资料</a>
                                    <a class="dropdown-item"
                                       href="{{route('user.home',auth()->user())}}">个人中心</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    @endauth
                    @guest()
                        <div class="form-inline my-2 my-lg-0">
                            <a href="{{route('register')}}" class="btn btn-outline-info btn-sm my-2 my-sm-0 mr-1">注册</a>
                            <a href="{{route('login')}}" class="btn btn-info btn-sm my-2 my-sm-0">登录</a>
                        </div>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
