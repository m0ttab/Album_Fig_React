<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Figurinha;

class FigurinhasController extends Controller {

    function index(){

        $figurinhas = DB::select('select * from figurinhas;');

        return view('figurinhas.index', ['figurinhas' => $figurinhas]);

    }

    function create(){

        return view('figurinhas.create');

    }

    public function insert(Request $request){
        try{

            DB::beginTransaction();

            $figurinhas = new Figurinha();

            $figurinhas->fill([
                "nome" => $request->nome,
                "dt_nascimento" => $request->dt_nascimento,
                "naturalidade" => $request->naturalidade,
                "foto" => "/public/foto.jpg",
                "numero" => 10
            ]);

            // $nomeFoto = uniqid() . '.' . $form->foto->extension();
            // Storage::putFileAs('public/fotos', $form->foto, $nomeFoto);

            $figurinhas->save();

            DB::commit();

            echo json_encode([
                'mensagem' => 'Figurinha criada com sucesso!'
            ]);
            
        }catch(e){

        }
    }

    public function show($id){

        $figurinhas = DB::select('select * from figurinhas where id = '. $id);

        return view('figurinhas.edit', ['figurinhas' => $figurinhas]);

    }

    public function edit(Request $request){

        $figurinhas = DB::select('select * from figurinhas')->where('id', $request->id);

        return view('figurinhas.editar', ['figurinhas' => $figurinhas]);

    }

    public function update(Request $request){

        // if(isset($form->foto)){
        //     $validarFoto = $form->validate([
        //         'foto' => 'mimes:jpg,jpeg,png'
        //     ]);
        //     Storage::delete('public/fotos/'.$figurinhas->foto);
        //     $nomeFoto = uniqid() . '.' . $form->foto->extension();
        //     Storage::putFileAs('public/fotos', $form->foto, $nomeFoto);

        //     $figurinhas->foto = $nomeFoto;
        // }

        DB::beginTransaction();

        $figurinhas = new Figurinha();

        $figurinhas->whereId($request->id)->update([
            "nome" => $request->nome,
            "dt_nascimento" => $request->dt_nascimento,
            "naturalidade" => $request->naturalidade,
            "foto" => "/public/foto.jpg",
            "numero" => 10
        ]);

        DB::commit();

        echo json_encode([
            'mensagem' => 'Registro atualizado!'
        ]);
    }

    public function destroy(Request $request)
    {
        try{

            DB::table('figurinhas')->delete($request->id);

            echo json_encode([
                'mensagem' => 'Figurinha excluida com sucesso!'
            ]);
            
        }catch(e){

        }
    }

    // public function delete(FigurinhasController $figurinhas){

    //     Storage::delete('public/fotos/'.$figurinhas->foto);
    //     $figurinhas->delete();

    //     return redirect()->route('figurinhas');
    // }

}
