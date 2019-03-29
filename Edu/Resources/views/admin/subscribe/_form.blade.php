<div class="card">
    <div class="card-header">
        设置订阅
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>订阅标题</label>
            <input type="text" name="title" class="form-control" required
            value="{{old('title',$subscribe['title']??'')}}">
        </div>
        <div class="form-group">
            <label>售价</label>
            <input type="text" name="price" class="form-control" required
                   value="{{old('price',$subscribe['price']??'')}}">
        </div>
        <div class="form-group">
            <label>增加月数</label>
            <input type="number" name="month" class="form-control" required
                   value="{{old('month',$subscribe['month']??'')}}">
        </div>
        <div class="form-group">
            <label>广告语</label>
            <input type="text" name="ad" class="form-control" required
                   value="{{old('ad',$subscribe['ad']??'')}}">
        </div>
        <div class="form-group">
            <label>图标</label>
            <input type="text" name="icon" class="form-control" required
                   value="{{old('icon',$subscribe['icon']??'')}}">
        </div>
    </div>
</div>
<button class="btn btn-success mt-2">保存提交</button>