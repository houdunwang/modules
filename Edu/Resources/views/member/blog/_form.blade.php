<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>视频标题</label>
            <input type="text" name="title" class="form-control" placeholder="请输入视频标题"
                   value="{{old('title',$blog['title']??'')}}">
        </div>
        <div class="form-group">
            <label>视频地址</label>
            <textarea name="path" class="form-control" rows="3">{{old('path',$blog['path']??'')}}</textarea>
          <small>请上传B站等第三方站点视频地址</small>
        </div>
        <div class="form-group">
            <label>封面图片</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="thumb" readonly="" required
                       value="{{old('thumb',$blog['thumb']??'')}}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="upload_image('thumb')" type="button">
                        选择文件
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block mt-1" id="thumb"
                 src="{{old('thumb',$blog['thumb']??asset('images/system/nopic.jpg'))}}" style="width: 150px;">
            <small>
                （格式jpeg、png，文件大小≤2MB，建议尺寸≥960*600）
            </small>
        </div>
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success">保存提交</button>
</div>