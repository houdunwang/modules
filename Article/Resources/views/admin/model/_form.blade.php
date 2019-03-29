<div class="card">
    <div class="card-header">
        模型参数
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>模型名称</label>
            <input type="text" name="name" class="form-control"
            value="{{old('name',$model['name']??'')}}">
        </div>
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success btn-sm">保存提交</button>
</div>