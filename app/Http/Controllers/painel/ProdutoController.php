<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    private $produto;
    private $categoria;


    public function __construct(Produto $produto, Categoria $categoria){
        $this->produto = $produto;
        $this->categoria = $categoria;
    }

    public function index(){
        $produtos = $this->produto->paginate(3);
        $categorias = $this->categoria->all();
        return view('painel.produtos', compact('produtos'), compact('categorias'));
    }


    public function guardarProduto(Request $req){
        $insert = $this->produto->create($req->all());

        if ($insert)
        return redirect()
                    ->route('produtos');
   
        return redirect()
        ->back()
        ->with('error', 'Falha ao inserir');
    }

    public function deletar($id){
        if($this->produto->find($id)){
            $produto = $this->produto->find($id);
            $delete = $produto->delete();

            if($delete){
                return redirect()->route('produtos');
            }
        } else{
            return redirect()->route('produtos');
        }
    }

    public function editar($id){
        if($this->produto->find($id)){
            $produtos = $this->produto->find($id);
            $categorias = $this->categoria->all();
            return view('painel.editar-produto', compact('produtos'), compact('categorias'));
        } else{
            return redirect()->route('produtos');
        }
    }

    public function update($id, Request $req){
        $produto_update = $this->produto->find($id);
        $update = $produto_update->update($req->all());

        if($update){
            return redirect()->route('produtos');
        }
    }
}
