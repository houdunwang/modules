<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.admin.tag.index'),'active')}}"
           href="{{module_link('edu.admin.tag.index')}}">
            标签列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.admin.tag.create'),'active')}}"
           href="{{module_link('edu.admin.tag.create')}}">
            添加标签
        </a>
    </li>
    @if (if_route('edu.admin.tag.edit'))
        <li class="nav-item">
            <a class="nav-link  {{active_class(!if_route('edu.admin.tag.edit'),'active')}}" href="#">
                修改标签
            </a>
        </li>
    @endif
</ul>