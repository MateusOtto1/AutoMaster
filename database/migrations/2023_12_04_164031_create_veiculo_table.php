<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculoTable extends Migration
{
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id('idveiculo');
            $table->string('modelo');
            $table->string('cor');
            $table->date('ano');
            $table->string('placa');
            $table->unsignedBigInteger('cliente_idcliente');
            $table->timestamps();

            $table->foreign('cliente_idcliente')
                  ->references('idcliente')
                  ->on('clientes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
