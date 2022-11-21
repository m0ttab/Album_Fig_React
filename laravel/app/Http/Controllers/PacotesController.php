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

        $pacotes = new PacotesController();

        $validar = $form->validate([
            'fugurinha' => 'required',
        ]);

        $pacotes->figurinha = $form->figurinha;

        $pacotes->save();

        return redirect()->route('pacotes');
    }

    public function show(PacotesController $pacotes){

        return view('pacotes.pacote', ['pacotes' => $pacotes]);
    }

    public function edit(PacotesController $pacotes){

        return view('pacotes.editar', ['pacotes' => $pacotes]);
    }

    public function update(PacotesController $pacotes, Request $form){

        $validar = $form->validate([
            'figurinha' => 'required',
        ]);

        $pacotes->figurinha = $form->figurinha;

        $pacotes->save();

        return redirect()->route('pacotes.show', ['pacotes' => $pacotes]);
    }

    public function apagar(PacotesController $pacotes){

        return view('pacotes.apagar', ['pacotes' => $pacotes]);
    }

}
