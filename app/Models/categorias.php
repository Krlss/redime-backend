<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    const CREATED_AT = 'creado_a';
    const UPDATED_AT = 'actualizado_a';

    public static $rules = [
        'nombre' => 'required|max:30',
        'estado' => 'in:ACTIVO,CANCELADO,ELIMINADO',
    ];

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function materiales()
    {
        return $this->hasMany(materiales::class, 'categoria_id');
    }
}
