<?php

namespace App\Http\Requests\Users;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class CreateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string',
            'email'         => 'required|email|unique:users,email',
            'password'      => ['required', 'string', new Password],
            'weekly_salary' => 'required|numeric',
            'role_id'       => 'required|numeric|exists:roles,id',
            'image'         => 'required|image'
        ];
    }
}
