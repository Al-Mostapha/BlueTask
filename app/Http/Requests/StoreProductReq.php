<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->admin)
            return true;

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "product_name"  =>  ["required", 'unique:products', 'max:255'],
            "product_desc"  =>  ["required", 'max:1024'],
            "product_price" =>  ["required","numeric",  'between:0,999.99'],
            "product_sale"  =>  ["required", "numeric",  'between:0,100'],
            "product_cat"   =>  ["required", "numeric",  'exists:categories,id'],
            'product_image' => 'required|mimes:png,jpg,jpeg',

        ];
    }


    public function messages()
    {

        return [
            'product_name.required' => "إسم العرض مطلوب",
            'product_desc.required' => "الوصف مطلوب"

        ];
    }
}
