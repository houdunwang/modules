<ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('blog.admin.article.index'),'active')}}"
               href="{{module_link('blog.admin.article.index')}}">
                内容列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('blog.admin.article.create'),'active')}}"
               href="{{module_link('blog.admin.article.create')}}">
                新增数据
            </a>
        </li>
        @if (if_route('blog.admin.article.edit'))
            <li class="nav-item">
                <a class="nav-link {{active_class(!if_route('blog.admin.article.update'),'active')}}" href="#">
                    修改资料
                </a>
            </li>
        @endif
    </ul>