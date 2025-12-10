<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'cantidad',
        'idCategoria',
        'estado'
    ];

    public $timestamps = true;

    protected $casts = [
        'cantidad' => 'integer'
    ];

    /**
     * Relación: Un producto pertenece a una categoría
     */
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'idCategoria', 'id');
    }

    /**
     * Relación: Un producto tiene muchos ingresos
     */
    public function ingresos()
    {
        // En PostgreSQL las columnas se almacenan en minúsculas
        return $this->hasMany(Ingresos::class, 'idproducto', 'id');
    }

    /**
     * Relación: Un producto tiene muchos egresos
     */
    public function egresos()
    {
        // En PostgreSQL las columnas se almacenan en minúsculas
        return $this->hasMany(Egresos::class, 'idproducto', 'id');
    }
}
