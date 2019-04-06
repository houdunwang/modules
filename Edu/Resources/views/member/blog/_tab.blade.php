<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.member.blog.index'),'active')}}"
           href="{{module_link('edu.member.blog.index')}}">
            播客列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{active_class(if_route('edu.member.blog.create'),'active')}}"
           href="{{module_link('edu.member.blog.create')}}">
            添加播客
        </a>
    </li>
    @if (if_route('edu.member.blog.edit'))
        <li class="nav-item">
            <a class="nav-link  {{active_class(!if_route('edu.member.blog.edit'),'active')}}" href="#">
                修改播客
            </a>
        </li>
    @endif
</ul>