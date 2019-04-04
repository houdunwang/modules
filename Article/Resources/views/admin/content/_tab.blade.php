<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.content.index'),'active')}}"
           href="{{module_link('article.admin.content.index')}}">
            文章列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.content.create'),'active')}}"
           href="{{module_link('article.admin.content.create')}}">
            添加文章
        </a>
    </li>
    @if (if_route('article.admin.content.edit'))
        <li class="nav-item">
            <a class="nav-link active"
               href="#">
                编辑文章
            </a>
        </li>
    @endif
</ul>
