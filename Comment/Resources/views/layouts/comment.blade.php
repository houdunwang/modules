<div id="comments">
    @foreach($model->comments as $key=>$comment)
        @include('comment::layouts._comment')
    @endforeach
</div>
{{--发表评论--}}
@guest
    <div class="container">
        <div class="row">
            <div class="col-12 bg-white p-5 border rounded text-center">
                <a href="javascript:void(0);" class="btn btn-success" onclick="user_login(true)">登录后发表评论</a>
            </div>
        </div>
    </div>
@endguest
@auth
    <form id="commentForm" method="post" onsubmit="return postComment()">
        <input type="hidden" name="comment_type" value="{{get_class($model)}}">
        <input type="hidden" name="comment_id" value="{{$model['id']}}">
        <input type="hidden" name="parent_id" value="0">
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
@endauth
@push('js')
    <script>
        //编辑器
        require(['hdjs', 'axios'], function (hdjs, axios) {
            hdjs.simplemdeMarkdownEditor('content', {}, function (simpleMde) {
                window.simpleMde = simpleMde;
            })
        });

        //发表评论
        function postComment() {
            require(['hdjs', 'axios'], function (hdjs, axios) {
                let action = "{!! module_link('comment.front.content.store')!!}";
                axios.post(action, $("#commentForm").serialize()).then(function (response) {
                    hdjs.swal({
                        text: response.data.message,
                        button: false,
                        icon: 'success'
                    });
                    //添加评论
                    $("#comments").append(response.data.view);
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

        //代码高亮
        require(['hdjs', 'marked', 'MarkdownIt', 'highlight'], function (hdjs, marked, MarkdownIt) {
            $('pre code').each(function (i, block) {
                hljs.configure({useBR: false});
                hljs.highlightBlock(block);
            });
        });

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
@endpush
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
