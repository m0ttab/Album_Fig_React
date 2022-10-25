<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PacotesController extends Controller {

    function index(){

        $pacotes = DB::select('select * from pacotes;');

        return view('pacotes.index', ['pacotes' => $pacotes]);
    }

    function create(){

        return view('pacotes.create');
    }

    public function insert(Request $form){

        $pacotes = new Pacotes();

        $validar = $form->validate([
            'fugurinha' => 'required',
        ]);

        $pacotes->figurinha = $form->figurinha;

        $pacotes->save();

        return redirect()->route('pacotes');
    }
    
    public function show(Pacotes $pacotes){

        return view('pacotes.pacote', ['pacotes' => $pacotes]);
    }

    public function edit(Pacotes $pacotes){

        return view('pacotes.editar', ['pacotes' => $pacotes]);
    }

    public function update(Pacotes $pacotes, Request $form){

        $validar = $form->validate([
            'figurinha' => 'required',
        ]);

        $pacotes->figurinha = $form->figurinha;

        $pacotes->save();

        return redirect()->route('pacotes.show', ['pacotes' => $pacotes]);
    }

    public function apagar(Pacotes $pacotes){

        return view('pacotes.apagar', ['pacotes' => $pacotes]);
    }
    
}