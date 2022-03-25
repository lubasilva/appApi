<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'laravel_through_key'];
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'codigo',
        'sequencia',
        'nome',
        'qtdvendida',
        'qtdentregue',
        'campo1',
        'campo2',
        'campo3'
    ];

    public function pedido()
    {
        return $this->hasMany(Pedido::class, 'id_produto', 'codigo');
    }

    public function pedidoporProduto()
    {
        return $this->hasMany(pedidoporProduto::class);
    }
}
