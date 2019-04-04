<div class="card">
    <div class="card-header">
        字段参数
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>字段标题</label>
            <input type="text" name="title" class="form-control"
                   value="{{old('title',$field['title']??'')}}" required placeholder="表单的 title 属性">
        </div>
        <div class="form-group">
            <label>字段名</label>
            <input type="text" name="name" class="form-control"
                   value="{{old('name',$field['name']??'')}}" required placeholder="表单的 name 属性">
        </div>
        <div class="form-group">
            <label>输入提示</label>
            <input type="text" name="placeholder" class="form-control"
                   value="{{old('placeholder',$field['placeholder']??'')}}" required>
        </div>
        <div class="form-group">
            <label>验证规则</label>
            <textarea name="rule" class="form-control" rows="4"></textarea>
            <small class="help-block">表单验证规则请参考
                <a href="https://www.houdunren.com/document/front/content/92?sid=1&mid=2">Laravel文档</a></small>
        </div>
    </div>
</div>
<div class="card mt-2" id="article" v-cloak="">
    <div class="card-header">
        字段参数
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>表单类型</label>
            <select class="form-control" v-model="active">
                <option v-for="(v,k) in fields" :value="k">@{{ v.title }}</option>
            </select>
        </div>
        <div class="card">
            <div class="card-body" v-if="active=='text'">
                <div class="form-group">
                    <label>默认值</label>
                    <input type="text" class="form-control" v-model="current.options.value">
                </div>
            </div>
            <div class="card-body" v-if="active=='textarea'">
                <div class="form-group">
                    <label>默认值</label>
                    <textarea class="form-control" cols="30" rows="3">@{{ current.options.value }}</textarea>
                </div>
                <div class="form-group">
                    <label>行数</label>
                    <input type="text" class="form-control" :value="current.options.rows">
                </div>
            </div>
        </div>
        <input type="text" name="field[type]" v-model="active" hidden>
        <textarea name="field[options]" rows="10" hidden>@{{ current }}</textarea>
    </div>
</div>
<div class="mt-2">
    <button class="btn btn-success btn-sm">保存提交</button>
</div>
<script>
    let field = {!! isset($field)?json_encode($field['field']):'null' !!}
    require(['vue', 'lodash'], function (vue, _) {
        new vue({
            el: '#article',
            data: {
                active: 'text',
                fields: {
                    text: {title: '单行文本', options: {value: ''}},
                    textarea: {title: '多行文本', options: {rows: 3}}
                }
            },
            mounted() {
                if (field) {
                    this.active = field.type;
                    this.fields[this.active] = _.assign(this.fields[this.active], field.options);
                }
            },
            computed: {
                current() {
                    return this.fields[this.active];
                }
            }
        })
    })
</script>
