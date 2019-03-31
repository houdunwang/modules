@inject('userVideoRepository','Modules\Edu\Repositories\UserVideoRepository')
<div class="card rounded shadow-sm mb-2 component-learn">
    <div class="card-header bg-white">
        <i class="fa fa-user"></i> 学习动态
    </div>
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            @foreach($userVideoRepository->paginate(8,['*'],'id') as $log)
                <div class="list-group-item ">
                    <div class="row">
                        <div class="col-sm-3 col-3 pr-0">
                            <a href="{{route('user.home',$log->user)}}">
                                <img src="{{$log->user->avatar}}"
                                     class="avatar rounded-circle img-thumbnail"
                                     alt="{{$log->user->name}}">
                            </a>
                        </div>
                        <div class="col-sm-9 col-9 pl-0">
                            <a href="{{route('edu.front.video.show',$log->video)}}"
                               class=" d-flex justify-content-between d-block mb-1">
                                <span class="title d-block">{{$log->video->format_title}}</span>
                            </a>
                            <div class="small text-black-50">
                                {{$log->user->name}} <i class="fa fa-clock-o"></i> {{$log->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>