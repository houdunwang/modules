@foreach($activities as $activity)
    @if ($activity->subject)
        @switch($activity['log_name'])
            @case('edu_topic')
            @include('edu::layouts.activity.edu_topic')
            @break
            @case('comment_content')
            @include('edu::layouts.activity.comment_content')
            @break
            @case('edu_sign')
            @include('edu::layouts.activity.edu_sign')
            @break
            @case('edu_exam')
            @include('edu::layouts.activity.edu_exam')
            @break
            @case('edu_lesson')
            @include('edu::layouts.activity.edu_lesson')
            @break
            @case('favour')
            @include('edu::layouts.activity.favour')
            @break
            @case('favorite')
            @include('edu::layouts.activity.favorite')
            @break
        @endswitch
    @endif
@endforeach
<div class="mt-4">
    {{$activities->links()}}
</div>