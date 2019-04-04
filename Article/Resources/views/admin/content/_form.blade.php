<div class="card">
    <div class="card-header">
        基础字段
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>标题</label>
            <input type="text" class="form-control" name="title"
                   value="{{old('title',$content['title']??'')}}">
        </div>
        <div class="form-group">
            <label>栏目</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{$cat['id']}}"
                        {{active_class($cat['id'] == ($content['category_id']??''),'selected')}}
                    >{!! $cat['_title'] !!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>来源</label>
            <input type="text" class="form-control" name="source"
                   value="{{old('source',$content['source']??'')}}">
        </div>
        <div class="form-group">
            <label>作者</label>
            <input type="text" class="form-control" name="author"
                   value="{{old('author',$content['author']??'')}}">
        </div>
        <div class="form-group">
            <label>摘要</label>
            <textarea class="form-control" name="description" rows="3">{{old('description',$content['description']??'')}}</textarea>
        </div>
        <div class="form-group">
            <label>缩略图</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="thumb" value="{{old('thumb',$content['thumb']??'')}}" readonly="">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="upload_image('thumb')" type="button">
                        选择图片
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block"
                 src="{{old('thumb',$content['thumb']??asset('images/system/nopic.jpg'))}}" style="width: 150px;">
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea id="container" name="content" style="height:300px;width:100%;">{{old('content',$content['content']??'')}}</textarea>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-header">
        扩展字段
    </div>
    <div class="card-body">
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success">保存提交</button>
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
