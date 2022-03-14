<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'codigo',
        'id_cliente',
        'id_unidade',
        'data', 
        'referencia'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'codigo');
    }

    public function produtos()
    {
        // return $this->hasMany(PedidoPorProduto::class, 'id_pedido');
        return  $this->hasManyThrough(Produto::class, PedidoPorProduto::class, 'id_pedido', 'codigo', 'codigo');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'id_unidade', 'codigo');
    }
}
