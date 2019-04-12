@include('blog::admin.article._tab')
@inject('fieldServer','App\Servers\FieldServer')
<div class="card">
    <div class="card-body">
        @foreach($fieldServer->form(module(),'BlogArticle',$field) as $form)
            {!! $form !!}
        @endforeach
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success">保存提交</button>
</div>
