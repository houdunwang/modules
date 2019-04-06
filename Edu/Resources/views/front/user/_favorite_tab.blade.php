<link rel="stylesheet" href="{{asset('modules/edu/css/app.css')}}">
<div>
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.front.user.favorite'),'active')}}"
               href="{{module_link('edu.front.user.favorite',['uid'=>$user['id']])}}">
                全部
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.front.user.favorite.lesson'),'active')}}"
               href="{{module_link('edu.front.user.favorite.lesson',['uid'=>$user['id']])}}">
                课程
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.front.user.favorite.video'),'active')}}"
               href="{{module_link('edu.front.user.favorite.video',['uid'=>$user['id']])}}">
                视频
            </a>
        </li>
    </ul>
</div>