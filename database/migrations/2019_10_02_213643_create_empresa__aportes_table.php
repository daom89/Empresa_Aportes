<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaAportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_aportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Codigo',7);
            $table->enum('Tipo', ['EPS', 'ARL', 'CCF', 'AFP', 'PARAFISCALES']);
            $table->bigInteger('NIT');
            $table->string('Administradora',120);
            $table->string('Nombre',80);
            $table->enum('Estado', ['Activo', 'Inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_aportes');
    }
}
