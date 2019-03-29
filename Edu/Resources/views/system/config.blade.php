<div class="card">
    <div class="card-header">
        基本设置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>网站名称</label>
            <input type="text" name="webname" class="form-control" value="{{$config['webname']??''}}">
        </div>
        <div class="form-group">
            <label>贴子标签组</label>
            <input type="text" name="topic_tag" class="form-control" value="{{$config['topic_tag']??''}}">
        </div>
        <div class="form-group">
            <label>课程标签组</label>
            <input type="text" name="lesson_tag" class="form-control" value="{{$config['lesson_tag']??''}}">
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-header">
        直播设置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>直播间地址</label>
            <input type="text" name="live_home" class="form-control" value="{{$config['live_home']??''}}"
                   placeholder="输入B站或斗鱼的址播间地址">
        </div>
        <div class="form-group">
            <label>播放地址</label>
            <input type="text" name="live_path" class="form-control" value="{{$config['live_path']??''}}"
                   placeholder="请输入直播平台的flash播放地址">
        </div>
        <div class="form-group">
            <label>直播公告</label>
            <textarea name="live_notice" class="form-control" rows="3">{{$config['live_notice']??''}}</textarea>
        </div>
    </div>
</div>