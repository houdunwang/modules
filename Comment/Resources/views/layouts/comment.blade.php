@foreach($model->comments as $key=>$comment)
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
                        <span class="fe fe-clock"></span>
                        {{$comment->created_at->format('Y-m-d h:i')}}
                    </time>
                </div>
            </div>
        </div>
        <div class="card-body text-secondary">
            <div class="comment-markdown markdown">
                {!! $comment->content !!}
            </div>
            <div class="small pt-3 mt-5">
                <span class="mr-3">#{{$key+1}}</span>
                <a href="javascript:void(0)"
                   onclick="commentFavour(this,'Modules-Comment-Entities-Content',{{$comment['id']}})"
                   class="text-secondary">
                    {{$comment->favour_count}} 个赞
                </a>
                @can('delete',$comment)
                    <form action="{{module_link('comment.front.content.destroy',$comment)}}" method="post"
                          class="d-inline-block">
                        @csrf @method('DELETE')
                    </form>
                    <button class="btn btn-sm btn-outline-danger pl-2 pr-2 pt-0 pb-0" onclick="destroy(this)">删除
                    </button>
                @endcan
            </div>
        </div>
    </div>
@endforeach
{{--发表评论--}}
<form id="commentForm" action="{!! module_link('comment.front.content.store')!!}" method="post" onsubmit="return post()">
    <input type="hidden" name="comment_type" value="{{get_class($model)}}">
    <input type="hidden" name="comment_id" value="{{$model['id']}}">
    @csrf
    <div class="card shadow-sm bg-white rounded">
        <div class="card-body p-0">
            @if (\Browser::isMobile())
                <div class="p-2">
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
            @else
                <div class="content-comment">
                    <textarea style="display:none;height: 100px;" id="content" name="comment_content"></textarea>
                    <script>
                        require(['hdjs', 'axios'], function (hdjs, axios) {
                            hdjs.simplemdeMarkdownEditor('content', {}, function (simpleMde) {
                                window.simpleMde = simpleMde;
                            })
                        });
                    </script>
                </div>
            @endif
        </div>
        <div class="card-footer text-muted bg-white">
            <button class="btn btn-success btn-sm mr-2">发表评论</button>
            <span class="text-muted small">
                    评论发布时间间隔 {{config_get('Comment.timeout',20)}} 秒
            </span>
        </div>
    </div>
</form>
<style>
    .content-comment {
        min-height: 300px;
    }

    .editor-toolbar {
        border: none
    }

    .CodeMirror, .CodeMirror-scroll {
        min-height: 200px;
        border-radius: 0;
    }

    .CodeMirror {
        border-left: none;
        border-right: none;
    }
</style>
<script>
    function post() {
        require(['hdjs', 'axios'], function (hdjs, axios) {
            let action = "{!! module_link('comment.front.content.store')!!}";
            axios.post(action, $("#commentForm").serialize()).then(function (response) {
                hdjs.swal({
                    text: response.data.message,
                    button: false,
                    icon: 'success'
                });
                if (window.simpleMde) {
                    window.simpleMde.value('');
                }
            }).catch(function (error) {
                hdjs.swal({
                    text: error.response.data.message,
                    button: false,
                    icon: 'warning'
                });
            });
            return false;
        });
        return false;
    }
</script>
<script>
    require(['hdjs', 'marked', 'MarkdownIt', 'highlight'], function (hdjs, marked, MarkdownIt) {
        $('pre code').each(function (i, block) {
            hljs.configure({useBR: false});
            hljs.highlightBlock(block);
        });
    })
</script>
<script>
    //评论点赞
    function commentFavour(el, model, id) {
        require(['hdjs', 'jquery', 'axios'], function (hdjs, $, axios) {
            let action = "/member/favour/make/Modules-Comment-Entities-Content/" + id;
            axios.get(action, {params: {}}).then(function (response) {
                if (response.data.action == 'add') {
                    $(el).text($(el).text() * 1 + 1)
                } else {
                    $(el).text($(el).text() * 1 - 1)
                }
            }).catch(function (error) {
                hdjs.swal({
                    text: error.response.data.errors,
                    button: false,
                    icon: 'warning'
                });
            })
        })
    }
</script>