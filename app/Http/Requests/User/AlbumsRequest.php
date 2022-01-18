<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AlbumsRequest extends FormRequest
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

        $rules = [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];

        if ($this->method() == 'POST') {
            $rules['cover'] = ['image', 'mimes:jpeg,png,jpg'];
        } else {
            $rules['cover'] = ['required', 'image', 'mimes:jpeg,png,jpg'];
        }
        
        return $rules;
    }
}
