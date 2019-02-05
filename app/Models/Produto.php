<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = ['categoria_id', 'desc'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public $rules = [
        'desc' => 'required|string',
     ];
}
