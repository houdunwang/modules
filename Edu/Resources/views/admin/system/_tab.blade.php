<ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.admin.system.index'),'active')}}"
               href="{{module_link('edu.admin.system.index')}}">
                内容列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('edu.admin.system.create'),'active')}}"
               href="{{module_link('edu.admin.system.create')}}">
                新增数据
            </a>
        </li>
        @if (if_route('edu.admin.system.edit'))
            <li class="nav-item">
                <a class="nav-link {{active_class(!if_route('edu.admin.system.update'),'active')}}" href="#">
                    修改资料
                </a>
            </li>
        @endif
    </ul>