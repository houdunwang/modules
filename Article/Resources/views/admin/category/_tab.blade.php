<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.category.index'),'active')}}"
           href="{{module_link('article.admin.category.index')}}">
            栏目列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.category.create'),'active')}}"
           href="{{module_link('article.admin.category.create')}}">
            添加栏目
        </a>
    </li>
    @if (if_route('article.admin.category.edit'))
        <li class="nav-item">
            <a class="nav-link active"
               href="#">
                编辑栏目
            </a>
        </li>
    @endif
</ul>
