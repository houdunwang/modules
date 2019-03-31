<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'parent_id' => 'required',
            'url'=>'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '栏目名称不能为空',
            'url.url'=>'栏目外部链接必须是合法的网址'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
