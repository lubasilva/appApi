<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDeVenda extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'codigo',
        'id_pedido',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'codigo');
    }

}


