<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.model.index'),'active')}}"
           href="{{module_link('article.admin.model.index')}}">
            模型列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.model.create'),'active')}}"
           href="{{module_link('article.admin.model.create')}}">
            添加模型
        </a>
    </li>
    @if (if_route('article.admin.model.edit'))
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('article.admin.model.edit'),'active')}}"
               href="#">
                添加模型
            </a>
        </li>
    @endif
</ul>