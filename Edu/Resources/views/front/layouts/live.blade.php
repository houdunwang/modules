@if (config_get('Edu.live_state',false))
    <div style="background: #313847" class="">
        <div class="container bg-white  p-0">
            <div class="card mb-2 shadow-sm border-0 p-0" id="live">
                @if(\Browser::isMobile() || \Browser::isTablet())
                    <div class="text-center p-5">
                        <a href="https://live.bilibili.com/8176658" target="_blank"
                           class="btn btn-info">进入直播间</a>
                    </div>
                @else
                    <div class="card-body p-0 border-0">
                        <embed width="100%" height="660px" allownetworking="all" allowscriptaccess="always"
                               src="{{config_get('Edu.live_path')}}"
                               quality="high" bgcolor="#000" wmode="window" allowfullscreen="true"
                               allowFullScreenInteractive="true" type="application/x-shockwave-flash">
                    </div>
                    <div class="card-footer text-muted text-center bg-white">
                        <a href="{{config_get('Edu.live_home')}}" target="_blank"
                           class="btn btn-outline-secondary btn-xs">进入直播间聊聊</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif