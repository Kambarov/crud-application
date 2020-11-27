<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|array',
            'name.*'        => 'required|string',
            'description'   => 'required|array',
            'description.*' => 'required|string',
            'image'         => 'nullable|image',
            'chat_id'       => 'nullable|numeric',
            'bot_token'     => 'nullable|string'
        ];
    }
}
