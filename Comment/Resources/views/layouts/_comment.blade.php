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
        @isset($key)
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
        @endisset
    </div>
</div>