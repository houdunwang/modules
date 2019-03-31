<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:60',
            'description' => 'nullable|max:100',
            'thumb' => ['required', 'regex:/(jpeg|jpg|png|gif)$/i'],
            'type' => 'required|in:system,video',
            'free' => 'required|in:1,0',
            'subscribe_free_play' => 'nullable|in:1,0',
            'free_num' => 'required',
            'price' => 'nullable|between:0,1000',
            'status' => 'required|in:1,0',
            'download_address' => 'nullable',
            'json' => 'json',
            'tags' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '课程名称不能为空',
            'title.max' => '课程名称最多60个字',
            'thumb.regex' => '请上传课程预览图片',
            'thumb.required' => '课程图片不能为空',
            'type.required'=>'请选择课程类型',
            'download_address.url' => '下载地址必须是合法的网址',
            'tags.required' => '请选择课程所属标签',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \site()->isManage(auth()->user());
    }
}
