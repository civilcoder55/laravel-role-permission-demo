<?php

namespace App\Http\Requests\User;

use App\Rules\CheckCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
            'password' => ['required', 'min:6', 'confirmed'],
            'current_password' => ['required', new CheckCurrentPassword]
        ];
    }
}
