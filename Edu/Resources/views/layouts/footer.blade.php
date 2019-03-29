<div class="container-fluid bg-white shadow-sm border-top text-secondary p-4">
    <div class="container">
        <div class="text-center p-3 p-sm-3">
            我们的使命：传播互联网前沿技术，帮助更多的人实现梦想
            <hr>
            Copyright © 2010-2018 houdunren.com All Rights Reserved
            {!! config_get('info.icp','','site') !!}
            <div class="small text-secondary mt-2">
                <i class="fa fa-phone-square" aria-hidden="true"></i> :
                {!! config_get('info.tel','','site') !!}
                <i class="fa fa-telegram ml-2" aria-hidden="true"></i> :
                <a href="mailto:{!! config_get('info.email','','site') !!}" class="text-secondary">
                    {!! config_get('info.email','','site') !!}
                </a>
                <div class="mt-2">
                    编码: <a href="http://www.aoxiangjun.com">向军大叔</a>
                </div>
            </div>
            {!! config_get('info.counter','','site') !!}
        </div>
    </div>
</div>