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
        $produto = $this->produto->find($id);
        $delete = $produto->delete();

        if($delete){
            return redirect()->route('produtos');
        }
    }
}
