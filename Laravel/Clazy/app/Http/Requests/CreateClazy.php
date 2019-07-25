<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClazy extends FormRequest
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
            'saving' => 'required',
            'salary' => 'required|numeric|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'saving' => '貯めたいお金',
            'salary' => '入ったお金',
        ];
    }

}
