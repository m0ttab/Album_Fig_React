<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller {

    public function index(){
        return view('usuarios.login');
    }

    public function validar(Request $form){
        $credenciais = $form->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        // testa as credenciais, já checando o hash
        if(Auth::attempt($credenciais)){
            $form->session()->regenerate();

            return redirect()->route('home');

        }else{
            return redirect()->back()->with('erro', 'Usuário ou senha incorretos');
        }
    }

    public function cadastrar(){
        return view('usuarios.cadastro');
    }

    public function create(Request $form){
        $usuario = new UsuariosController();

        $validar = $form->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'confirmpassword' => 'required'
        ]);

        if($form->password != $form->confirmpassword){
            return redirect()->back()->with('erro', 'Senhas não conferem');
        }

        $usuario->nome = $form->nome;
        $usuario->email = $form->email;
        $usuario->senha = Hash::make($form->senha);

        $usuario->save();

        return redirect()->route('home');

    }

    public function sair(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
