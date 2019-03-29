<ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('document.member.article.index'),'active')}}"
               href="{{module_link('document.member.article.index')}}">
                文档列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('document.member.article.create'),'active')}}"
               href="{{module_link('document.member.article.create')}}">
                添加文档
            </a>
        </li>
        @if (if_route('document.member.article.edit'))
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    修改文档
                </a>
            </li>
        @endif
    </ul>