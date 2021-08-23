<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('products')->ignore($this->id)
            ],
            'price' => 'required|numeric|min:1',
            'promotion_price' => 'numeric|lte:price',
            'quantity' => 'required|numeric|between:1,200',
            'uploadfile' => 'mimes:jpg,bmp,png,jpeg|required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Hãy Nhập Tên Sản Phẩm',
            'name.unique' => 'Tên Sản Phẩm Đã Tồn Tại',
            'price.required' => 'Hãy Nhập Giá Sản Phẩm',
            'quantity.required' => 'Hãy Nhập Số Lượng Sản Phẩm',
            'price.numeric' => 'Giá Sản Phẩm Không Đúng Định Dạng',
            'price.min' => 'Giá Sản Phẩm Thấp Nhất Phải Bằng 1',
            'promotion_price.numeric' => 'Giá Khuyến Mại Sản Phẩm Không Đúng Định Dạng',
            'promotion_price.lte' => 'Giá Khuyến Mại Sản Phẩm Phải Nhỏ Hơn Giá Gốc',
            'quantity.between' => 'Số Lượng Sản Phẩm Phải Từ 1 Đến 200',
            'quantity.numeric' => 'Số Lượng Sản Phẩm Không Đúng Định Dạng',
            'uploadfile.mimes' => 'File Ảnh Sản Phẩm Không Đúng Định Dạng (jpg,bmp.png,jpeg)',
            'uploadfile.required' => 'Hãy Chọn Ảnh Sản Phẩm',
        ];
    }
}
