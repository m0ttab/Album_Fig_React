<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Exception;

class UsuariosController extends Controller {

    public function index(){

        $usuarios = DB::select('select * from usuarios');

        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function login(){
        return view('usuarios.login');
    }

    public function validar(Request $form){



        // $credenciais = $form->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);


        // // testa as credenciais, já checando o hash
        // if(Auth::attempt($credenciais)){
        //     $form->session()->regenerate();

        //     return redirect()->route('home');

        // }else{
        //     return redirect()->back()->with('erro', 'Usuário ou senha incorretos');
        // }

    }

    public function create(Request $form){
        return view('usuarios.create');
    }

    public function insert(Request $request){
        try{

            DB::beginTransaction();

            $usuarios = new Usuario();

            $usuarios->fill([
                "nome" => $request->nome,
                "email" => $request->email,
                "senha" => $request->senha,
            ]);

            $usuarios->save();

            DB::commit();

            echo json_encode([
                'mensagem' => 'Usuário criado com sucesso!'
            ]);

        }catch(Exception $e){

        }
    }

    public function show($id){

        $usuarios = DB::select('select * from usuarios where id = '. $id);

        return view('usuarios.edit', ['usuarios' => $usuarios]);

    }

    public function edit(Request $request){

        $usuarios = DB::table()->find($request->id);

        return view('usuarios.editar', ['usuarios' => $usuarios]);

    }

    public function update(Request $request){

        DB::beginTransaction();

        $usuarios = new Usuario();

        $usuarios->whereId($request->id)->update([
            "nome" => $request->nome,
            "email" => $request->email,
            "senha" => $request->senha,
        ]);

        DB::commit();

        echo json_encode([
            'mensagem' => 'Registro atualizado!'
        ]);
    }

    public function destroy(Request $request)
    {
        try{

            DB::table('usuarios')->delete($request->id);

            echo json_encode([
                'mensagem' => 'Usuário excluido com sucesso!'
            ]);

        }catch(Exception $e){

        }
    }

    public function sair(Request $request){
        // Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect()->route('home');
    }
}
