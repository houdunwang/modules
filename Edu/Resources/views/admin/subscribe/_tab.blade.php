<ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.admin.subscribe.index'),'active')}}"
               href="{{module_link('edu.admin.subscribe.index')}}">
                订阅列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.admin.subscribe.create'),'active')}}"
               href="{{module_link('edu.admin.subscribe.create')}}">
                新增订阅
            </a>
        </li>
        @if (if_route('edu.admin.subscribe.edit'))
            <li class="nav-item">
                <a class="nav-link {{active_class(!if_route('edu.admin.subscribe.update'),'active')}}" href="#">
                    修改订阅
                </a>
            </li>
        @endif
    </ul>