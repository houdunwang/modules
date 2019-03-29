@inject('topicRepository','Modules\Edu\Repositories\TopicRepository')
<div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white">
        <i class="fa fa-comment-o"></i> 最新贴子
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            @foreach($topicRepository->news() as $topic)
                <a href="{{route('edu.front.topic.show',$topic)}}" class="list-group-item">
                    {{$topic['title']}}
                </a>
            @endforeach
        </div>
    </div>
</div>