@if ($activity->subject)
    <div class="border-bottom border-gray mb-3 comment-markdown">
        <div class="media text-muted pt-1">
            <a href="{{route('user.home',$activity->causer)}}">
                <img src="{{asset($activity->causer['avatar'])}}" class="avatar rounded mt-1">
            </a>
            <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                <h6 class="">
                    <a href="{{ $activity->subject->getActivityLink() }}">
                        {!! $activity->subject->getActivityTitle() !!}
                    </a>
                </h6>
                <div>
                    <span class="badge badge-success font-weight-light">签到</span>
                    <span class="small font-weight-light">
                        发表于 {{$activity['updated_at']->diffForHumans()}}
                    </span> .
                </div>
            </div>
        </div>
    </div>
@endif