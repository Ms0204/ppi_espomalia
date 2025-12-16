<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Eliminar tabla temporal si existe de intentos anteriores
        Schema::dropIfExists('egresos_temp');
        
        // Crear tabla temporal con la estructura correcta
        Schema::create('egresos_temp', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->date('fechaegreso');
            
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')
                ->references('id')
                ->on('productos')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            
            $table->string('codigoinventario');
            $table->foreign('codigoinventario')
                ->references('codigo')
                ->on('inventarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
        
        // Copiar datos convirtiendo el ID a código
        $hasObservacion = Schema::hasColumn('egresos', 'observacion');
        
        if ($hasObservacion) {
            DB::statement('
                INSERT INTO egresos_temp (id, cantidad, fechaegreso, idproducto, codigoinventario, observacion, created_at, updated_at)
                SELECT e.id, e.cantidad, e.fechaegreso, e.idproducto, i.codigo, e.observacion, e.created_at, e.updated_at
                FROM egresos e
                LEFT JOIN inventarios i ON e.codigoinventario = i.id
            ');
        } else {
            DB::statement('
                INSERT INTO egresos_temp (id, cantidad, fechaegreso, idproducto, codigoinventario, created_at, updated_at)
                SELECT e.id, e.cantidad, e.fechaegreso, e.idproducto, i.codigo, e.created_at, e.updated_at
                FROM egresos e
                LEFT JOIN inventarios i ON e.codigoinventario = i.id
            ');
        }
        
        // Eliminar tabla original
        Schema::dropIfExists('egresos');
        
        // Renombrar tabla temporal
        Schema::rename('egresos_temp', 'egresos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('egresos', function (Blueprint $table) {
            // Eliminar la llave foránea
            $table->dropForeign(['codigoinventario']);
            
            // Eliminar la columna
            $table->dropColumn('codigoinventario');
        });

        Schema::table('egresos', function (Blueprint $table) {
            // Restaurar la columna como unsignedBigInteger
            $table->unsignedBigInteger('codigoInventario')->after('idproducto');
            
            // Restaurar la llave foránea al id
            $table->foreign('codigoInventario')
                ->references('id')
                ->on('inventarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }
};
