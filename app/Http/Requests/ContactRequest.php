<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:50',
            'email' => ['required', 'min:5', 'max:100', 'email'],
            'subject' => ['required', 'min:5', 'max:100'],
            'message' => ['required', 'min:5', 'max:10000'],
        ];
    }
    public function messages(): array {
        return [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите email',
            'subject.required' => 'Введите тему сообщения',
            'message.required' => 'Введите сообщение',
            'name.min' => 'Имя должо быть не менее 2 символов',
            'name.max' => 'Имя должо быть не более 50 символов',
            'email.min' => 'Email должен быть не менее 5 символов',
            'email.max' => 'Email должен быть не ,более 100 символов',
            'subject.min' => 'subject должен быть не менее 5 символов',
            'subject.max' => 'subject должен быть не ,более 100 символов',
            'message.min' => 'message должен быть не менее 5 символов',
            'message.max' => 'message должен быть не ,более 10 000 символов',
        ];
    }
}
