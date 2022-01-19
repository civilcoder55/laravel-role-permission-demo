<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'roles' =>  ['array'],
            'roles.*' => 'integer'
        ];

        if ($this->method() == 'PUT') {

            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->route('user')->id];

            // validate password in updating only if password is sent
            if ($this->has('password') && !empty($this->password)) {
                $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
            }
        } else {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }

        return $rules;
    }
}
