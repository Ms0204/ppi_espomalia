<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egresos extends Model
{
    protected $table = 'egresos';
    
    protected $fillable = [
        'cantidad',
        'fechaegreso',
        'idproducto',
        'codigoinventario',
        'observacion'
    ];

    public $timestamps = true;
    
    protected $casts = [
        'fechaegreso' => 'date',
        'cantidad' => 'integer'
    ];

    /**
     * Relación con Producto
     */
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'idproducto', 'id');
    }

    /**
     * Relación con Inventario
     */
    public function inventario()
    {
        return $this->belongsTo(Inventarios::class, 'codigoinventario', 'codigo');
    }

    // Accessors y mutators para compatibilidad con camelCase
    public function getFechaEgresoAttribute()
    {
        return $this->attributes['fechaegreso'] ?? null;
    }

    public function setFechaEgresoAttribute($value): void
    {
        $this->attributes['fechaegreso'] = $value;
    }

    public function getIdProductoAttribute()
    {
        return $this->attributes['idproducto'] ?? null;
    }

    public function setIdProductoAttribute($value): void
    {
        $this->attributes['idproducto'] = $value;
    }

    public function getCodigoInventarioAttribute()
    {
        return $this->attributes['codigoinventario'] ?? null;
    }

    public function setCodigoInventarioAttribute($value): void
    {
        $this->attributes['codigoinventario'] = $value;
    }
}
