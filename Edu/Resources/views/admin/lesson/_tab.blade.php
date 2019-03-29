<ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.admin.lesson.index'),'active')}}"
               href="{{module_link('edu.admin.lesson.index')}}">
                课程列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.admin.lesson.create'),'active')}}"
               href="{{module_link('edu.admin.lesson.create')}}">
                新增课程
            </a>
        </li>
        @if (if_route('edu.admin.lesson.update'))
            <li class="nav-item">
                <a class="nav-link {{active_class(!if_route('edu.admin.lesson.update'),'active')}}" href="#">
                    修改课程
                </a>
            </li>
        @endif
    </ul>