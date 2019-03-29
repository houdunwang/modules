@inject('LessonRepository','Modules\Edu\Repositories\LessonRepository')
<div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white">
        <i class="fa fa-video-camera"></i> 最新课程
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            @foreach($LessonRepository->news(5) as $lesson)
                <a href="{{route('edu.front.lesson.show',$lesson)}}" class="list-group-item">{{$lesson['title']}}</a>
            @endforeach
        </div>
    </div>
</div>