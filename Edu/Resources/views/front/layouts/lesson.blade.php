<div class="card shadow-sm rounded mb-4 edu-lesson-card">
    <div class="card-body p-0 thumb border-bottom">
        <a href="{{route('edu.front.lesson.show',$lesson)}}">
            <img src="{{$lesson['thumb']}}" alt="{{$lesson['title']}}"
                 class="border-0 p-0 rounded-0">
        </a>
    </div>
    <div class="card-header bg-white border-bottom-0 title">
        <a href="{{route('edu.front.lesson.show',$lesson)}}">
            {{$lesson['title']}}
        </a>
    </div>
    <div class="card-footer d-flex justify-content-between small bg-white">
        <div>
            <a href="{{route('edu.front.lesson.show',$lesson)}}">
                开始学习
            </a>
        </div>
        <div>
            <i class="fa fa-film ml-3" aria-hidden="true"></i>
            {{$lesson['video_num']??0}} 节课
        </div>
    </div>
</div>