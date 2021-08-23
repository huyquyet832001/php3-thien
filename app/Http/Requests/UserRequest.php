<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->id),
                'email',
            ],
            'address' => 'required',
            'gender' => 'required|in:' . implode(',', config('common.user.gender')),
            'password' => 'required|min:6|max:40',
            'passwordAgain' => 'required|same:password',
            'phone_number' => [
                'required',
                Rule::unique('users')->ignore($this->id)
            ],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không Được Bỏ Trống',
            'name.max' => 'Họ tên không được vượt qua 100 ký tự',
            'email.email' => 'Sai định dạnh email',
            'email.unique' => 'Email đã tồn tại',
            'phone_number.unique' => 'Số Điện Thoại đã tồn tại',
            'password.min' => 'Mật Khẩu Phải Có Ít Nhất 6 Ký Tự',
            'password.max' => 'Mật Khẩu Tối Đa 40 Ký Tự',
            'passwordAgain.same' => 'Mật Khẩu Nhập Lại Không Khớp Với Mật Khẩu Trên',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'password' => 'Mật Khẩu',
            'passwordAgain' => 'Bạn Chưa Nhập Lại Mật Khẩu',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'gender' => 'Giới Tính',
            'phone_number' => 'Số Điện Thoại',
        ];
    }
}
