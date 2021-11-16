<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidationRequest extends FormRequest
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
            'cat_slug'   => 'unique:categories',
            'sub_slug'   => 'unique:subcategories',
            'chlid_slug' => 'unique:childcategories',
            'photo'      => 'mimes:jpeg,jpg,png',
            'email'      => 'unique:users|unique:admins',
            'logo'       => 'mimes:jpeg,jpg,png,gif',
            'favicon'    => 'mimes:ico',
            'shop_name'  => 'unique:users'
        ];
    }

    public function messages()
    {
    return [
         'cat_slug.unique' => 'This slug has already been taken.',
         'sub_slug.unique' => 'This slug has already been taken.',
         'child_slug.unique' => 'This slug has already been taken.',
    ];
    }
}
