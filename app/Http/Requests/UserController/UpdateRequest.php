<?php

namespace App\Http\Requests\UserController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'photo' => 'file',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'patronymic' => 'required|string',
            'city' => 'required|string',
            'whatsapp' => 'required|string',
            'telegram' => 'required|string',
            'email' => 'required|string'
        ];
    }
}
