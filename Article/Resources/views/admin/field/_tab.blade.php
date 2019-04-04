<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.model.index'))}}"
           href="{{module_link('article.admin.model.index')}}">
            返回模型
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.field.index'),'active')}}"
           href="{{module_link('article.admin.field.index',$model)}}">
            字段列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('article.admin.field.create',$model),'active')}}"
           href="{{module_link('article.admin.field.create',$model)}}">
            添加字段
        </a>
    </li>
    @if (if_route('article.admin.field.edit'))
        <li class="nav-item">
            <a class="nav-link active"
               href="#">
                编辑字段
            </a>
        </li>
    @endif
</ul>
