<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:250',
            'content' => 'required',
            'uploadfile' => 'mimes:jpg,bmp,png,jpeg|required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Hãy Nhập Tiêu Đề',
            'title.max' => 'Tiêu Đề Không Quá 250 Ký Tự ',
            'content.required' => 'Hãy Nhập Nội Dung Tin Tức',
            'uploadfile.mimes' => 'File Ảnh Tin Tức Không Đúng Định Dạng (jpg,bmp.png,jpeg)',
            'uploadfile.required' => 'Hãy Chọn Ảnh Tin Tức',
        ];
    }
}
