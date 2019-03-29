<div id="menu">
    <ul class='serialization vertical example'>
        @foreach($menus as $menu)
            <li>
                <a id="dropdownMenuButton{{$menu['id']}}" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false" class="{{active_class($menu['id']==$content['id'],'text-success')}}">
                    {{$menu['title']}}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$menu['id']}}">
                    <a class="dropdown-item" href="{{module_link('document.member.content.edit',['id'=>$menu['id']])}}">编辑</a>
                    <form action="{{module_link('document.member.content.destroy',['id'=>$menu['id']])}}" method="post">
                        @csrf @method('DELETE')
                    </form>
                    <a class="dropdown-item" href="#" onclick="destroy(this)">删除</a>
                    <a class="dropdown-item" href="#" data-toggle="modal"
                       data-target="#updateModal{{$menu['id']}}"
                       onclick="rename('{{$menu['title']}}',{{$menu['id']}})">重命名</a>
                </div>
                <input type="hidden" name="menus[{{$menu['id']}}][id]" value="{{$menu['id']}}">
                <input type="hidden" name="menus[{{$menu['id']}}][parent_id]" class="parent_id"
                       value="{{$menu['parent_id']}}">
                <input type="hidden" name="menus[{{$menu['id']}}][rank]" value="{{$menu['rank']}}" class="rank">
                <ul>
                    @foreach($menu['_data'] as $m)
                        <li>
                            <a id="dropdownMenuButton{{$m['id']}}" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false" class="{{active_class($m['id']==$content['id'],'text-success')}}">
                                {{$m['title']}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$m['id']}}">
                                <a class="dropdown-item"
                                   href="{{module_link('document.member.content.edit',['id'=>$m['id']])}}">编辑</a>
                                <form action="{{module_link('document.member.content.destroy',['id'=>$m['id']])}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a class="dropdown-item" href="#" onclick="destroy(this)">删除</a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                   data-target="#updateModal{{$m['id']}}"
                                   onclick="rename('{{$m['title']}}',{{$m['id']}})">重命名</a>
                            </div>
                            <input type="hidden" name="menus[{{$m['id']}}][id]" value="{{$m['id']}}">
                            <input type="hidden" name="menus[{{$m['id']}}][parent_id]" class="parent_id"
                                   value="{{$m['parent_id']}}">
                            <input type="hidden" name="menus[{{$m['id']}}][rank]" value="{{$m['rank']}}" class="rank">
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
<div class="pt-3">
    <div class="text-center">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal"
                data-target="#createModal">新建章节
        </button>
    </div>
    <form method="post" action="{{module_link('document.member.content.store')}}">
        @csrf
        <input type="hidden" name="article_id" value="{{$article['id']}}">
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>文档标题</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">保存添加</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{--重命名--}}
<div class="modal fade" id="renameModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label>文档标题</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">保存修改</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('js')
    <script>
        //重命名
        function rename(title, id) {
            require(['axios', 'jquery'], function (axios, $) {
                $("#renameModal").modal('show')
                $("#renameModal").find("input[name='title']").val(title);
                $("#renameModal form").attr('action', '/document/member/content-rename/' + id);
            })
        }

        //拖放菜单
        function sortMenu() {
            require(['hdjs', 'jquerySortable', 'axios'], function (hdjs, jquerySortable, axios) {
                let group = $("ul.serialization").sortable({
                    group: 'serialization',
                    delay: 500,
                    onDrop: ($item, container, _super) => {
                        _super($item, container);
                        let pid = $($item).parent('ul').parent('li').find('input[name^="menus"]').val();
                        $($item).find('input.parent_id').val(pid ? pid : 0);
                        //更新菜单
                        $("#menu li").each(function (index) {
                            $(this).find('.rank').val(index)
                        });
                        let data = $("#menu input[name^='menus']").serialize();
                        axios.post('{!! module_link("document.member.menu.store",['aid'=>$article['id']]) !!}', data)
                            .then(() => {
                                location.reload(true);
                            });
                    }
                });
            })
        }
        sortMenu();
    </script>
@endpush
@push('css')
    <style>

    </style>
@endpush