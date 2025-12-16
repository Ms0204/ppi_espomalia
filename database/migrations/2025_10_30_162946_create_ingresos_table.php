<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->date('fechaingreso');

            // producto: FK to productos.id
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')
                ->references('id')
                ->on('productos')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            // codigoInventario: FK to inventarios.codigo (string unique)
            $table->string('codigoinventario');
            $table->foreign('codigoinventario')
                ->references('codigo')
                ->on('inventarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
