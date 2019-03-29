@extends('document::member.content.master')
@section('content')
    <div class="row">
        <div class="col-2 border-right">
            <div class="p-2">
                {{--<ul class="nav nav-tabs mb-2">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link active" href="#">--}}
                            {{--目录--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                <div class="">
                    @include('document::member.menu.index')
                </div>
            </div>
        </div>
        <div class="col-10 p-0">
            <form action="{{module_link('document.member.content.update',$content)}}" method="post" id="contentForm"
                  @submit.prevent="updateContent">
                @csrf @method('PUT')
                <div id="editormd">
                    <textarea style="display:none;">{{$content['markdown']}}</textarea>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        //编辑器
        require(['hdjs', 'axios', 'iziToast','bootstrap'], function (hdjs, axios, iziToast) {
            var timeoutId = null;
            hdjs.editormd("editormd", {
                width: '100%',
                height: '92vh',
                toolbarIcons: function () {
                    return [
                        "bold", "del", "italic", "quote", "|",
                        "list-ul", "list-ol", "hr", "|",
                        "link", "hdimage", "|",
                        "watch", "preview", "fullscreen"
                    ]
                },
                path: "{{asset('js/hdjs')}}/package/editor.md/lib/",
                onchange: function () {
                    if (!timeoutId) {
                        timeoutId = setTimeout(() => {
                            let data = $("#contentForm").serialize();
                            axios.post("{{module_link('document.member.content.update',$content)}}", data)
                                .then((response) => {
                                    timeoutId = null;
                                });
                        }, 1000);
                    }
                }
            });
        });
    </script>
@endpush
@push('css')
    <style>
        .editormd {
            border: none !important;
        }

        .iframeMenu {
            width: 100%;
            height: 100vh;
        }
        body.dragging, body.dragging * {
            cursor: move !important;
        }

        .serialization li {
            cursor: pointer;
        }

        .serialization .dropdown-menu {
            min-width: auto;
        }
        .dragged {
            position: absolute;
            opacity: 0.5;
            z-index: 2000;
        }

        ol.example li.placeholder {
            position: relative;
        }

        ol.example li.placeholder:before {
            position: absolute;
        }
    </style>
@endpush