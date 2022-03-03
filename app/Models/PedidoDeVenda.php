<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDeVenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_pedido',
        'id_cliente',
        'id_unidade',
        'id_produto',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function produto()
    {
        return $this->belongsToMany(Produto::class, 'id_produto', 'id');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

}


