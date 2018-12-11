<?php

namespace App\Http\Requests;

use App\Rules\Value;
use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            //
            'image' => 'mimes:jpeg,jpg,png|max:1000',
            'avatar' => 'mimes:jpeg,jpg,png|max:1000',
            'cost' => new Value(),
            'quantity' => new Value(),
        ];
    }
}
