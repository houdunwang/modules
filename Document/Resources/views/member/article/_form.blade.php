<div class="card">
    <div class="card-header">
        文档设置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>文档名称</label>
            <input type="text" name="title" class="form-control" required value="{{old('title',$article['title']??'')}}">
        </div>
    </div>
</div>
<div class="mt-3">
    <button class="btn btn-sm btn-success">保存提交</button>
</div>