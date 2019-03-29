<div class="form-group">
    <input type="text" name="title"
           value="{{old('title',$topic['title']??'')}}"
           class="form-control form-control-lg" placeholder="请输入贴子标题" required>
</div>
<div>
    @foreach ($tags as $tag)
        <label class="p-2 text-uppercase">
            <input type="checkbox" name="tags[]" value="{{$tag['id']}}"
                    {{active_class($topic->hasTag($tag),'checked')}}>
            {{$tag['name']}}
        </label>
    @endforeach
</div>
<div class="form-group">
    <div class="content">
        <textarea style="display:none;" name="content" id="content">{{old('content',$topic['content']??'')}}</textarea>
        <script>
            require(['hdjs'], function (hdjs) {
                hdjs.simplemdeMarkdownEditor('content')
            });
        </script>
    </div>
</div>
<button class="btn btn-outline-secondary">保存提交</button>