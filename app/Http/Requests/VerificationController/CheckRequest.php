<?php

namespace App\Http\Requests\VerificationController;

use Illuminate\Foundation\Http\FormRequest;

class CheckRequest extends FormRequest
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
            'number' => 'string',
            'phone' => 'string',
            'lastname' => 'string',
            'name' => 'string',
            'patronymic' => 'string'
        ];
    }
}
