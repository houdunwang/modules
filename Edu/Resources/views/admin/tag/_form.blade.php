<div class="card">
    <div class="card-header">
        设置标签
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>标签名称</label>
            <input type="text" name="name" class="form-control" required
            value="{{old('name',$tag['name']??'')}}">
        </div>
        <div class="form-group">
            <label>标签分组</label>
            <input type="text" name="group" class="form-control" required
                   value="{{old('group',$tag['group']??'')}}">
            <small class="help-block">标签组名称文章和课程使用标签组</small>
        </div>
    </div>
</div>
<button class="btn btn-success mt-2">保存提交</button>