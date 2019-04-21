<div class="card mb-2 bg-white shadow-sm rounded" id="{{$comment['id']}}">
    <div class="card-header bg-white">
        <div class="row mb-1">
            <div class="col-auto pr-3">
                <a href="{{route('user.home',$comment->user)}}">
                    <img src="{{$comment->user['avatar']}}" class="avatar rounded-circle img-thumbnail">
                </a>
            </div>
            <div class="col ml-0 pl-0 pt-2">
                <h6 class="comment-title text-muted mb-0 text-black-50 font-weight-bold">
                    {{$comment->user['name']}}
                </h6>
                <time class="comment-time small text-secondary text-black-50 font-weight-lighter">
                    <i class="fa fa-clock-o"></i>
                    {{$comment->created_at->format('Y-m-d h:i')}}
                </time>
            </div>
        </div>
    </div>
    <div class="card-body text-secondary">
        <div class="comment-markdown markdown">
            @if ($comment->parent_id>0)
                <div class="float-left pr-2">
                    <a href="{{route('user.home',$comment->reply->user)}}" class="text-secondary text-black-50">
                        {{'@'.$comment->reply->user->name}}
                    </a>
                </div>
            @endif
            {!! $comment->content !!}
        </div>
        @isset($key)
            <div class="small pt-3 mt-5">
                <span class="mr-3">#{{$key+1}}</span>
                <a href="javascript:void(0)"
                   onclick="commentFavour(this,'Modules-Comment-Entities-Content',{{$comment['id']}})"
                   class="text-secondary">
                    {{$comment->favour_count}} 个赞
                </a>
                @auth
                    <a href="javascript:void(0);" class="pl-2 pr-2 pt-0 pb-0"
                       onclick="reply('{{$comment->user->name}}',{{$comment->user->id}},{{$comment['id']}})">
                        <i class="fa fa-reply"></i> 回复
                    </a>
                @endauth
                @can('delete',$comment)
                    <form action="{{module_link('comment.front.content.destroy',$comment)}}" method="post"
                          class="d-inline-block">
                        @csrf @method('DELETE')
                    </form>
                    <button class="btn btn-sm btn-outline-danger pl-2 pr-2 pt-0 pb-0" onclick="destroy(this)">
                        删除
                    </button>
                @endcan
            </div>
        @endisset
    </div>
</div>
@push('js')
    <script>
        function reply(name, user_id, comment_id) {
            require(['hdjs'], function (hdjs) {
                $("[name='parent_id']").val(comment_id);
                window.simpleMde.value('@' + name + ' ');
                hdjs.scrollTo('body', '.content-comment', 10, {queue: true});
                window.simpleMde.codemirror.on("change", function () {
                    if (!/^@/.test(window.simpleMde.value())) {
                        $("[name='parent_id']").val(0);
                    }
                });
            });
        }
    </script>
@endpush