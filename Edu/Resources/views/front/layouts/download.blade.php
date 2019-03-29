<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">下载地址</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5 text-center">
                <a href="{{$lesson->download_address}}"
                   class="h6 text-success">
                    <strong>{{$lesson->download_address}}</strong>
                </a>
            </div>
        </div>
    </div>
</div>