<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sequencia',
        'nome',
        'qtdvendida',
        'qtdentregue',
        'campo1',
        'campo2',
        'campo3'
    ];
}
