<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index(){
        $cats = Categoria::all();
        return view('painel.home', compact('cats'));
    }

    public function guardarCat(Request $req, Categoria $cat){
        $insert = $cat->create($req->all());

        if ($insert)
        return redirect()
                    ->route('painel');

        
        return redirect()
        ->back()
        ->with('error', 'Falha ao inserir');
    }


    public function deletar($id, Categoria $cats){
        $categoria = $cats->find($id);
        $delete = $categoria->delete();

        if($delete){
            return redirect()->route('painel');
        }
    }

    public function editar($id, Categoria $cats){
        $cat = $cats->find($id);
        return view('painel.editar', compact('cat'));
    }

    public function update($id, Categoria $cats, Request $req){
        $cat = $cats->find($id);
        $update = $cat->update($req->all());

        if($update){
            return redirect()->route('painel');
        }
    }
}
