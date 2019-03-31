@if ($activity->subject)
    <div class="border-bottom border-gray mb-3">
        <div class="media text-muted pt-1">
            <a href="{{route('user.home',$activity->causer)}}">
                <img src="{{asset($activity->causer['avatar'])}}"
                     class="avatar rounded mt-1">
            </a>
            <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                <h6 class="">
                    <a href="{{$activity->subject->getLink()}}"
                       class="topic-title pb-2 d-inline-block activity-title font-size-15">
                        {{$activity->subject->getTitle()}}
                    </a>
                </h6>
                <div>
                    <span class="badge badge-info font-weight-light">考试</span>
                    <span class="small font-weight-light">
                    {{$activity->description=='updated'?'更新':'发表'}}
                        于 {{$activity['updated_at']->diffForHumans()}}
                    </span> .
                </div>
            </div>
        </div>
    </div>
@endif