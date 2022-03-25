<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoPorProduto extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'codigo',
        'id_produto',
        'id_pedido',
    ];
}