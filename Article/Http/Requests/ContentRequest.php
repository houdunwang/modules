<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|max:100',
            'author' => 'max:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.min' => '标题不能小于10个字',
            'title.max' => '标题不能超过100个字',
            'author' => '作者不能超过10个字',
        ];
    }


    public function authorize()
    {
        return true;
    }
}
