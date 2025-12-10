<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    protected $table = 'ingresos';
    protected $fillable = [
        'cantidad',
        'fechaingreso',
        'idproducto',
        'codigoinventario',
        'observacion'
    ];

    public $timestamps = true;
    
    protected $casts = [
        'fechaingreso' => 'date',
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

    // Accessors y mutators para mantener compatibilidad con camelCase
    public function getFechaIngresoAttribute()
    {
        return $this->attributes['fechaingreso'] ?? null;
    }

    public function setFechaIngresoAttribute($value): void
    {
        $this->attributes['fechaingreso'] = $value;
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
