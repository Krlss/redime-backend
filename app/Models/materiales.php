<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiales extends Model
{
    use HasFactory;

    const CREATED_AT = 'creado_a';
    const UPDATED_AT = 'actualizado_a';

    public static $rules = [
        'nombre' => 'required|max:50',
        'descripcion' => 'required',
        'stock_minimo' => 'required|numeric',
        'categoria_id' => 'required|numeric',
        'estado' => 'in:ACTIVO,CANCELADO,ELIMINADO',
    ];

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'stock_minimo',
        'categoria_id',
        'creado_a',
        'actualizado_a'
    ];

    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'categoria_id');
    }
}
