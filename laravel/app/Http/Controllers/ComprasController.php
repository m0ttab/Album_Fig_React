<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ComprasController extends Controller {

    function index(){

        $compras = DB::select('select * from compras;');

        return view('compras.index', ['compras' => $compras]);
    }

    function create(){

        if(Auth::user()){
            return view('compras.create');
        }else{
            return redirect()->route('login');
        } 
    }

    public function insert(Request $form){

        $compras = new Compras();

        $validar = $form->validate([
            'pacote' => 'required',
        ]);

        $compras->pacote = $form->pacote;

        $compras->save();

        return redirect()->route('compras');
    }
    
    public function show(Compras $compras){

        return view('compras.compra', ['compras' => $compras]);
    }

}