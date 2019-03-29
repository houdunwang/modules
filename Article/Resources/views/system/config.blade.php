<div class="card">
    <div class="card-header">
        模块配置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>网站名称
                <small class="text-secondary">webname</small>
            </label>
            <input type="text" name="webname" class="form-control" value="{{$config['webname']??''}}">
        </div>
        <div class="form-group">
            <label>客服电话</label>
            <input type="text" name="tel" class="form-control" value="{{$config['tel']??''}}">
        </div>
        <div class="form-group">
            <label>联系邮箱</label>
            <input type="text" name="email" class="form-control" value="{{$config['email']??''}}">
        </div>
        <div class="form-group">
            <label>ICP备案号</label>
            <input type="text" name="icp" class="form-control" value="{{$config['icp']??''}}">
        </div>

    </div>
</div>