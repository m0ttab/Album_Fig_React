<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FigurinhasController extends Controller {

    function index(){

        $figurinhas = DB::select('select * from figurinhas;');

        return view('figurinhas.index', ['figurinhas' => $figurinhas]);
    }

    function create(){
        if(Auth::user()){
            return view('figurinhas.create');
        }else{
            return redirect()->route('login');
        }
    }

    public function insert(Request $form){

        $figurinhas = new FigurinhasController();

        $validar = $form->validate([
            'nome' => 'required',
            'dt_nasc' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'naturalidade' => 'required'
        ]);

        $nomeFoto = uniqid() . '.' . $form->foto->extension();
        Storage::putFileAs('public/fotos', $form->foto, $nomeFoto);

        $figurinhas->nome = $form->nome;
        $figurinhas->dt_nasc = $form->dt_nasc;
        $figurinhas->foto = $nomeFoto;
        $figurinhas->naturalidade = $form->naturalidade;

        $figurinhas->save();

        echo json_encode([
            'mensagem' => 'Figurinha criada com sucesso!'
        ]);

        return redirect()->route('figurinhas');
    }

    public function show(FigurinhasController $figurinhas){

        return view('figurinhas.figurinha', ['figurinas' => $figurinhas]);
    }

    public function edit(FigurinhasController $figurinhas){

        if(Auth::user()){
            return view('figurinhas.editar', ['figurinhas' => $figurinhas]);
        }else{
            return redirect()->route('login');
        }
    }

    public function update(FigurinhasController $figurinhas, Request $form){

        if(isset($form->foto)){
            $validarFoto = $form->validate([
                'foto' => 'mimes:jpg,jpeg,png'
            ]);
            Storage::delete('public/fotos/'.$figurinhas->foto);
            $nomeFoto = uniqid() . '.' . $form->foto->extension();
            Storage::putFileAs('public/fotos', $form->foto, $nomeFoto);

            $figurinhas->foto = $nomeFoto;
        }
        $validar = $form->validate([
            'nome' => 'required',
            'dt_nasc' => 'required',
            'nacionalidade' => 'required'
        ]);

        $figurinhas->nome = $form->nome;
        $figurinhas->dt_nasc = $form->dt_nasc;
        $figurinhas->nacionalidade = $form->nacionalidade;

        $figurinhas->save();

        return redirect()->route('figurinhas.show', ['figurinhas' => $figurinhas]);
    }

    public function apagar(FigurinhasController $figurinhas){

        if(Auth::user()){
            return view('figurinhas.apagar', ['figurinhas' => $figurinhas]);
        }else{
            return redirect()->route('login');
        }
    }

    public function delete(FigurinhasController $figurinhas){

        Storage::delete('public/fotos/'.$figurinhas->foto);
        $figurinhas->delete();

        return redirect()->route('figurinhas');
    }

}
