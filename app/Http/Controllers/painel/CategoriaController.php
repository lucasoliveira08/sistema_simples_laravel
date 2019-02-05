<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    private $categoria;

    public function __construct(Categoria $cat){
        $this->categoria = $cat;
    }


    public function index(){
        $cats = $this->categoria->paginate(3);
        return view('painel.home', compact('cats'));
    }

    public function guardarCat(Request $req){
        $insert = $this->categoria->create($req->all());

        if ($insert)
        return redirect()
                    ->route('painel');
   
        return redirect()
        ->back()
        ->with('error', 'Falha ao inserir');
    }


    public function deletar($id){
        if($this->categoria->find($id)){
            $categoria = $this->categoria->find($id);
            $delete = $categoria->delete();

            if($delete){
                return redirect()->route('painel');
            }
        } else{
            return redirect()->route('painel');
        }
    }

    public function editar($id){
        if($this->categoria->find($id)){
            $cat = $this->categoria->find($id);
            return view('painel.editar', compact('cat'));
        } else{
            return redirect()->route('painel');
        }
    }


    public function update($id, Request $req){
        $cat = $this->categoria->find($id);
        $update = $cat->update($req->all());

        if($update){
            return redirect()->route('painel');
        }
    }

}
