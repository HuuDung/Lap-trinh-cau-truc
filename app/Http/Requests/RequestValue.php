<?php

namespace App\Http\Requests;

use App\Rules\Value;
use Illuminate\Foundation\Http\FormRequest;

class RequestValue extends FormRequest
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
            'balance' => new Value(),
            'product.*.quantity' => new Value(),
        ];
    }
}
