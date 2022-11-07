<?php

namespace App\Http\Requests\VolunteersController;

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
            'whatsapp' => 'url',
            'telegram' => 'url',
            'email' => 'email',
            'note' => 'nullable|string',
            'password' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'photo.file' => 'Фото должно быть файлом',
            'name.required' => 'Поле имя обязательное',
            'name.string' => 'Поле имя должно быть строкой',
            'lastname.required' => 'Поле фамилия обязательное',
            'lastname.string' => 'Поле фамилия должно быть строкой',
            'patronymic.required' => 'Поле отчество обязательное',
            'patronymic.string' => 'Поле отчество должно быть строкой',
            'city.required' => 'Поле город обязательное',
            'city.string' => 'Поле город должно быть строкой',

            'whatsapp.url' => 'Поле whatsapp имеет невалидный url',
            'telegram.url' => 'Поле telegram имеет невалидный url',
            'email.email' => 'Поле Email невалидное'
        ];
    }
}
