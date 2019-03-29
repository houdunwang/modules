<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
           role="tab" aria-controls="home" aria-selected="true">基本参数</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
           aria-controls="profile" aria-selected="false">模板参数</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
           aria-controls="contact" aria-selected="false">单页面</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active bg-white border border-top-0 p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-group">
            <label>栏目名称</label>
            <input type="text" name="title" class="form-control"
                   value="{{old('title',$model['title']??'')}}">
        </div>
        <div class="form-group">
            <label>父级栏目</label>
            <select name="parent_id" class="form-control">
                <option value="0">== 顶级栏目 ===</option>
            </select>
        </div>
        <div class="form-group">
            <label>栏目摘要</label>
            <textarea name="description" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <div class="tab-pane fade bg-white border border-top-0 p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="form-group">
            <label>封面模板</label>
            <input type="text" name="tpl_index" class="form-control"
                   value="{{old('tpl_index',$model['tpl_index']??'')}}">
        </div>
        <div class="form-group">
            <label>列表页模板</label>
            <input type="text" name="tpl_list" class="form-control"
                   value="{{old('tpl_list',$model['tpl_list']??'')}}">
        </div>
        <div class="form-group">
            <label>内容页模板</label>
            <input type="text" name="tpl_content" class="form-control"
                   value="{{old('tpl_content',$model['tpl_content']??'')}}">
        </div>
    </div>
    <div class="tab-pane fade bg-white border border-top-0 p-2" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <textarea id="container" style="height:300px;width:100%;"></textarea>
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success btn-sm">保存提交</button>
</div>
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.ueditor('container', {hash: 2, data: 'hd'}, function (editor) {
                console.log('编辑器执行后的回调方法1')
            });
        })
    </script>
@endpush
