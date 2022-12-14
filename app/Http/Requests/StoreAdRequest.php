<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'img' => 'dimensions:max_height=250'
        ];
    }

    public function messages(){
        return [
            'img' => 'طول الصورة لا يجب ان يزيد عن 250 بكسل'
        ];
    }
}
