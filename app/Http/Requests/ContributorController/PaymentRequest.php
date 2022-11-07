<?php

namespace App\Http\Requests\ContributorController;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name' => 'required|string',
            'lastname' => 'required|string',
            'patronymic' => 'required|string',
            'phone' => 'required|string',
            'country_id' => 'required|string',
            'recommender_id' => 'integer|nullable',
            'city' => 'required|string',
            'sum' => 'numeric',
            'email' => 'email|unique:users,email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'lastname.required' => 'Введите фамилию',
            'patronymic.required' => 'Введите отчество',
            'phone.required' => 'Введите телефон',
            'country_id.required' => 'Выберите страну',
            'city.required' => 'Введите город',
            'sum.required' => 'Введите сумму',
            'email.email' => 'Email неверный',
            'email.unique' => 'Такой Email уже есть в базе'
        ];
    }
}
