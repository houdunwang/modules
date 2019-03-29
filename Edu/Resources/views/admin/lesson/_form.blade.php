{{--后台发表课程--}}
@inject('TagRepository','Modules\Edu\Repositories\TagRepository')
<div class="row">
    <div class="col-12" id="app" v-cloak="">
        @include('edu::admin.lesson._tab')
        <div class="card">
            <div class="card-header">基本信息</div>
            <div class="card-body border-bottom-0">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">课程标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" required
                               value="{{old('title',$lesson['title']??'')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">所属标签</label>
                    <div class="col-sm-10">
                        @foreach($TagRepository->all() as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="tags[]"
                                       {{active_class($lesson->hasTag($tag),'checked')}}
                                       value="{{$tag['id']}}" type="checkbox" id="tag{{$tag['id']}}">
                                <label class="form-check-label" for="tag{{$tag['id']}}">{{$tag['name']}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">课程类型</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="type1" class="custom-control-input" name="type" value="system"
                                    {{active_class(old('type',$lesson['type']??'video')=='system','checked')}}>
                            <label class="custom-control-label" for="type1">系统课程</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="type2" class="custom-control-input" name="type" value="video"
                                    {{active_class(old('type',$lesson['type']??'video')=='video','checked')}}>
                            <label class="custom-control-label" for="type2">实战视频</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">课程介绍</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" rows="3"
                        >{{old('description',$lesson['description']??'')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">课程状态</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status1" name="status" value="1" class="custom-control-input"
                                    {{active_class(old('status',$lesson['status']??1)==1,'checked')}}>
                            <label class="custom-control-label" for="status1">上架</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status2" name="status" value="0" class="custom-control-input"
                                    {{active_class(old('status',$lesson['status']??1)==0,'checked')}}>
                            <label class="custom-control-label" for="status2">下架</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">推荐课程</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="is_commend1" name="is_commend" value="1"
                                   class="custom-control-input"
                                    {{active_class(old('is_commend',$lesson['is_commend']??1)==1,'checked')}}>
                            <label class="custom-control-label" for="is_commend1">是</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="is_commend2" name="is_commend" value="0"
                                   class="custom-control-input"
                                    {{active_class(old('is_commend',$lesson['is_commend']??1)==0,'checked')}}>
                            <label class="custom-control-label" for="is_commend2">否</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">课程图片</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <input class="form-control form-control" readonly="" name="thumb"
                                   value="{{old('thumb',$lesson['thumb']??'')}}">
                            <div class="input-group-append">
                                <button onclick="upload_image('thumb')" class="btn btn-secondary" type="button">
                                    选择图片
                                </button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <img src="{{old('thumb',$lesson['thumb']??asset('images/system/nopic.jpg'))}}"
                                 class="img-responsive img-thumbnail" width="150">
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        下载设置
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2">只允许下载</label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="only_down1" name="only_down" value="1" class="custom-control-input"
                                            {{active_class(old('only_down',$lesson['only_down']??0)==1,'checked')}}>
                                    <label class="custom-control-label" for="only_down1">是</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="only_down2" name="only_down" value="0" class="custom-control-input"
                                            {{active_class(old('only_down',$lesson['only_down']??0)==0,'checked')}}>
                                    <label class="custom-control-label" for="only_down2">否</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">下载地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="download_address"
                                       value="{{old('download_address',$lesson['download_address']??'')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        收费课程设置
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2">收费方式</label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="free1" name="free" value="1"
                                           class="custom-control-input"
                                            {{active_class(old('free',$lesson['free']??1)==1,'checked')}}>
                                    <label class="custom-control-label" for="free1">免费</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="free2" name="free" value="0"
                                           class="custom-control-input"
                                            {{active_class(old('free',$lesson['free']??1)==0,'checked')}}>
                                    <label class="custom-control-label" for="free2">收费</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">课程售价</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="price"
                                           aria-label="Recipient's username"
                                           aria-describedby="price"
                                           value="{{old('price',$lesson['price']??50)}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="price">元</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">订阅用户免费</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="subscribe_free_play1"
                                           name="subscribe_free_play" value="1"
                                           class="custom-control-input"
                                            {{active_class(old('subscribe_free_play',$lesson['subscribe_free_play']??1)==1,'checked')}}>
                                    <label class="custom-control-label" for="subscribe_free_play1">是</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="subscribe_free_play2"
                                           name="subscribe_free_play" value="0"
                                           class="custom-control-input"
                                            {{active_class(old('subscribe_free_play',$lesson['subscribe_free_play']??1)==0,'checked')}}>
                                    <label class="custom-control-label" for="subscribe_free_play2">否</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">免费观看数量</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="free_num"
                                       value="{{old('free_num',$lesson['free_num']??3)}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3" v-show="editLessonVideo">
            <div class="card-header mb-2">课程视频</div>
            <div class="card-body">
                <div class="row">
                    <draggable v-model="videos" element="ul" @start="drag=true" @end="drag=false" class="col-12">
                        <li class="card mb-2" v-for="(video,k) in videos" :key="k">
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <input type="text" v-model="video.title" class="form-control" placeholder="课程标题"
                                           aria-describedby="helpId" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" v-model="video.path" class="form-control" placeholder="视频链接"
                                           aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <input type="text" v-model="video.external_address" class="form-control"
                                           placeholder="外部播放地址，比如B站播放地址" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <button class="btn btn-secondary btn-sm" type="button" @click="delVideo(k)">删除</button>
                                <button class="btn btn-secondary btn-sm" type="button" @click="question_show(video)"
                                        data-toggle="modal" :data-target="'#question'+k">
                                    考题 (@{{video.question?video.question.length:0}})
                                </button>
                                <button class="btn btn-secondary btn-sm" type="button" @click="addNextVideo(k)">插入视频
                                </button>
                                {{--考题--}}
                                <div class="modal fade bd-example-modal-lg" :id="'question'+k" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="video.question"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">考题</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card mt-3" v-for="(question,k) in video.question">
                                                    <div class="card-header bg-white border-bottom-0 pb-0">
                                                        <div class="form-group mb-0">
                                                            <input type="text" v-model="question.title"
                                                                   class="form-control form-control-sm"
                                                                   placeholder="请输入问题">
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-3 pb-0">
                                                        <div class="input-group mb-3 input-group-sm"
                                                             v-for="(topic,n) in question.topics">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <input type="checkbox" v-model="topic.right">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   aria-label="Text input with checkbox"
                                                                   v-model="topic.topic">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                        @click="topic_del(question.topics,n)">删除
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-muted">
                                                        <div class="btn-group btn-group-sm" role="group">
                                                          <button type="button" class="btn btn-secondary" @click="topic_add(question.topics)">添加答案</button>
                                                          <button type="button" class="btn btn-outline-secondary" @click="question_del(video,k)">删除题目</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        @click="question_add(video)">
                                                    添加题目
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--考题结束--}}
                            </div>
                        </li>
                    </draggable>
                </div>
            </div>
            <div class="card-footer">
                <textarea name="videos" hidden cols="30" rows="10">@{{videos}}</textarea>
                <button class="btn btn-secondary btn-sm" type="button" @click="addVideo()">添加视频</button>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-success btn-sm" type="submit">保存发布</button>
            <div class="fixed-bottom text-right m-3 mb-5">
                <button class="btn btn-light text-black-50 btn-sm border" @click="editLessonVideo= !editLessonVideo" type="button">
                    编辑视频
                </button>
            </div>
        </div>
    </div>

</div>
@push('js')
    <script>
        require(['vue', 'hdjs', 'vuedraggable'], function (Vue, hdjs, draggable) {
            new Vue({
                el: "#app",
                components: {
                    draggable: draggable
                },
                data: {
                    videos: {!! json_encode($lesson->video->toArray()) !!},
                    editLessonVideo: false,
                },
                methods: {
                    addVideo() {
                        this.videos.push({title: '', path: '', duration: 0, question: []})
                    },
                    addNextVideo(k) {
                        this.videos.splice(k, 0, {title: '', path: '', duration: 0, question: []})
                    },
                    delVideo(index) {
                        hdjs.confirm('确定删除吗？', () => {
                            this.videos.splice(index, 1)
                        })
                    },
                    //问题
                    question_show(video) {
                        video.question = video.question ? video.question : [];
                    },
                    question_add(video) {
                        video.question.push({title: '', topics: [{topic: '', right: false}]});
                    },
                    question_del(video, k) {
                        hdjs.confirm('确定删除这个问题吗', () => {
                            video.question.splice(k, 1);
                        })
                    },
                    //答案
                    topic_add(topics) {
                        topics.push({topic: '', right: false})
                    },
                    topic_del(topics, k) {
                        topics.splice(k, 1);
                    }
                }
            })
        })
    </script>
@endpush
