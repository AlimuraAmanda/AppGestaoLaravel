<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

  public function produtosDetalhe() {

    return $this->hasOne('App\Models\ProdutosDetalhe');
  }
}