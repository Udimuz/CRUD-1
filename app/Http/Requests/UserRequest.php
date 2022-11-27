<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
		//Log::error($this);

		// собираем набор правил валидаций, требований:
		// Сначала была проверка уникальности Почты простая:
//        return [
//            'name' => 'required|min:3|max:55',	// Обязательное, Минимальное значение - 3 символа, максимальное - 55
//			'email' => 'required|unique:users,email|min:3|max:255|email',	//Обязательное, уникальность, минимум-макс, email
//        ];
		$rules = [
			'name' => 'required|min:3|max:55',	// Обязательное, Минимальное значение - 3 символа, максимальное - 55
			'email' => ['required','min:3','max:255','email'],	//Обязательное, минимум, макс, email
		];
		// Правило:  Кроме существующего (чтобы позволяло сохранять значение, которое мы сейчас и правим, нажали ИЗМЕНИТЬ):
		// Смогли собрать только такой сложной конструкцией:
		if (!empty($this->user))
			$rules['email'][] = Rule::unique('users')->ignore($this->user->id);
		else
			$rules['email'][] = Rule::unique('users');

		return $rules;
    }

}
