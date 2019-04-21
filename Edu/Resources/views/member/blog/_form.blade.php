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
          <small>请上传B站等第三方站点视频地址，如果是iframe要填写iframe中src属性值</small>
        </div>
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success">保存提交</button>
</div>