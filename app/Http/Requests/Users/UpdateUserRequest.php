<?php

namespace App\Http\Requests\Users;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string',
            'email'         => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'password'      => [
                'nullable',
                'string',
                new Password
            ],
            'weekly_salary' => 'required|numeric',
            'role_id'       => 'required|numeric|exists:roles,id',
            'image'         => 'nullable|image'
        ];
    }
}
