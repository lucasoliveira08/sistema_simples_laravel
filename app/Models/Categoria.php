<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   public $timestamps = false;
   
   protected $fillable = ['nome'];

   
   public $rules = [
      'nome' => 'required|string',
   ];
}
