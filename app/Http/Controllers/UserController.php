<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->only([
            'name', 'email', 'birth_date', 'person_type',
            'cpf', 'cnpj', 'phone', 'state', 'city'
        ]);
    
        // nova foto
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }
    
        // atualiza senha somente se preenchida
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('user.show', $user)->with('success', 'Perfil atualizado com sucesso!');
    }
    
    public function destroy(Request $request, User $user)
    {
        // verifica a senha
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Senha incorreta, não foi possível excluir a conta.']);
        }

        //remove foto se existir
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect('/')->with('success', 'Conta excluída com sucesso!');
    }

    public function removePhoto(User $user)
    {
        if ($user->photo) {
            // guarda caminho da foto na sessão antes de excluir
            session([
                'deleted_photo' => $user->photo,
                'deleted_photo_user_id' => $user->id,
            ]);
    
            $user->photo = null;
            $user->save();
        }
    
        return redirect()->back()->with('photo_deleted', 'Foto de perfil excluída com sucesso!');
    }
    
    // desfazer exclusão da foto de perfil
    public function undoRemovePhoto(Request $request)
    {
        if (session()->has('deleted_photo') && session()->has('deleted_photo_user_id')) {
            $user = User::find(session('deleted_photo_user_id'));
    
            if ($user && !$user->photo) {
                $user->photo = session('deleted_photo');
                $user->save();
    
                // limpa sessão
                session()->forget(['deleted_photo', 'deleted_photo_user_id']);
    
                return redirect()->back()->with('success', 'Exclusão de foto desfeita com sucesso!');
            }
        }
    
        return redirect()->back()->with('error', 'Nada para desfazer.');
    }
}