<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(16)->format('Y-m-d')],
            'person_type' => ['required', 'in:física,jurídica'],
            'cpf' => ['required_if:person_type,física', 'nullable', 'string', 'max:14', 'unique:users'],
            'cnpj' => ['required_if:person_type,jurídica', 'nullable', 'string', 'max:18', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'state' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
        ], [
            'password.regex' => 'Formato de senha inválido.',
            'password.confirmed' => 'Senhas diferentes.',
            'cpf.unique' => 'CPF já cadastrado.',
            'cnpj.unique' => 'CNPJ já cadastrado.',
            'email.unique' => 'Email já cadastrado.',
            'phone.unique' => 'Telefone já cadastrado.',
            'birth_date.before_or_equal' => 'Você deve ter pelo menos 18 anos.',

        ]);
    }

    protected function create(array $data)
    {
        $photoPath = null;
        if (isset($data['photo'])) {
            $photoPath = $data['photo']->store('photos', 'public');
        }

        return User::create([
            'name' => $data['name'],
            'birth_date' => $data['birth_date'],
            'person_type' => $data['person_type'],
            'cpf' => $data['cpf'] ?? null,
            'cnpj' => $data['cnpj'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'state' => $data['state'],
            'city' => $data['city'],
            'photo' => $photoPath,
            'password' => Hash::make($data['password']),
        ]);
    }
}
