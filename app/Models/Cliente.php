<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'codigo',
        'nome',
        'cnpj',
        'email',
        'tipo',
        'municipio'
    ];
}
