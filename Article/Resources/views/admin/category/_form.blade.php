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
                   value="{{old('title',$category['title']??'')}}">
        </div>
        <div class="form-group">
            <label>栏目模型</label>
            <select name="model_id" class="form-control" required>
                @foreach($models as $model)
                    <option value="{{$model['id']}}"
                            {{active_class(($category['model_id']??'')==$model['id'],'selected')}}
                    >{{$model['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>外部链接</label>
            <input type="text" name="url" class="form-control"
                   value="{{old('url',$category['url']??'')}}">
            <small class="help-block">当设置外部链接时直接跳转到链接地址</small>
        </div>
        <div class="form-group">
            <label>栏目预览图</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="preview" value="{{old('preview',$category['preview']??'')}}" readonly="">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="upload_image('preview')" type="button">
                        选择图片
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block"
                 src="{{old('preview',$category['preview']??asset('images/system/nopic.jpg'))}}" style="width: 150px;">
        </div>
        <div class="form-group">
            <label>父级栏目</label>
            <select name="parent_id" class="form-control">
                <option value="0">== 顶级栏目 ===</option>
                @foreach($categories as $cat)
                    <option value="{{$cat['id']}}"
                        {{active_class($cat['selected'],'selected')}}
                        {{active_class($cat['disabled'],'disabled')}}
                    >{!! $cat['_title'] !!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>栏目摘要</label>
            <textarea name="description" rows="3" class="form-control">{{old('description',$category['description']??'')}}</textarea>
        </div>
    </div>
    <div class="tab-pane fade bg-white border border-top-0 p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="form-group">
            <label>封面模板</label>
            <input type="text" name="tpl_index" class="form-control"
                   value="{{old('tpl_index',$category['tpl_index']??'index')}}">
        </div>
        <div class="form-group">
            <label>列表页模板</label>
            <input type="text" name="tpl_list" class="form-control"
                   value="{{old('tpl_list',$category['tpl_list']??'list')}}">
        </div>
        <div class="form-group">
            <label>内容页模板</label>
            <input type="text" name="tpl_content" class="form-control"
                   value="{{old('tpl_content',$category['tpl_content']??'content')}}">
        </div>
    </div>
    <div class="tab-pane fade bg-white border border-top-0 p-2" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <textarea id="container" name="content" style="height:300px;width:100%;">{{old('description',$category['content']??'')}}</textarea>
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
