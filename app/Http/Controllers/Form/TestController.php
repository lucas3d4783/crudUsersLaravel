<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    
    public function listAllUsers()
    {
        $users = User::all(); //Consultando todos os usuários do banco

        //dd($users);

        return view('listAllUsers', [
            'users' => $users
        ]);

    }

    public function listUser(User $user){
        //dd($user);

        return view('listUser', [
            'user' => $user
        ]);

    }

    public function formAddUser(){
        return view('addUser');
    }

    public function storeUser(Request $request){ //tem que ser usado para acessar os dados da requisição
        //dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->save();

        return redirect()->route('users.listAll');

    }

    public function formEditUser(User $user){
        return view('editUser', [
            'user' => $user
        ]);
    }

    public function edit(User $user, Request $request){ //tem que ser usado para acessar os dados da requisição
        //dd($user, $request);
        $user->name = $request->name;
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){//verificando se o e-mail é válido
            $user->email = $request->email;
        }
        if(!empty($request->password)){ //se a senha não for vazia
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.listAll'); //retornando para a listagem de usuários

    }

    public function destroy(User $user){
        //dd($user);
        $user->delete();
        return redirect()->route('users.listAll');
    }

}
