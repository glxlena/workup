<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $userId = $this->route('user')->id;

        $rules = [
            'name' => ['required', 'string', 'min:2', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'birth_date' => ['nullable', 'date'],
            'person_type' => ['required', 'in:física,jurídica'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:20'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
        ];

        if ($this->person_type === 'física') {
            $rules['cpf'] = ['required', 'string', 'min:11', 'max:14', Rule::unique('users')->ignore($userId)];
            $rules['cnpj'] = ['nullable', 'string'];
        } else {
            $rules['cnpj'] = ['required', 'string', 'min:14', 'max:18', Rule::unique('users')->ignore($userId)];
            $rules['cpf'] = ['nullable', 'string'];
        }

        if ($this->filled('password')) {
            $rules['password'] = [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/', // pelo menos uma letra maiúscula
                'regex:/[0-9]/', // pelo menos um número
                'regex:/[!@#$%^&*()\-_=+{};:,<.>]/', // pelo menos um caractere especial
            ];
        }

        return $rules;
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O nome pode ter no máximo :max caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
            'person_type.required' => 'O tipo de pessoa é obrigatório.',
            'person_type.in' => 'O tipo de pessoa selecionado não é válido.',
            'photo.image' => 'O arquivo deve ser uma imagem.',
            'photo.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg, gif.',
            'photo.max' => 'A imagem não pode ter mais que 2MB.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está em uso.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está em uso.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'password.required' => 'A nova senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.',
        ];
    }
}