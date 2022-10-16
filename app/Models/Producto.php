<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'caracteristica',      
        'genero',
        'stock',
        'precio',
        'imagen',
        'categoria_id',
    ];

    public function Categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
