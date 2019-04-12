<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('blog.admin.article.index'),'active')}}"
           href="{{module_link('blog.admin.article.index')}}">
            文章列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('blog.admin.article.create'),'active')}}"
           href="{{module_link('blog.admin.article.create')}}">
            添加文章
        </a>
    </li>
    @if (if_route('blog.admin.article.edit'))
        <li class="nav-item">
            <a class="nav-link active" href="#">
                编辑文章
            </a>
        </li>
    @endif
</ul>
