<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicoTable extends Migration
{
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id('idordem_servico');
            $table->float('valor');
            $table->string('descricao');
            $table->date('data_emissao');
            $table->date('data_conclusao');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('equipe_idequipe');
            $table->unsignedBigInteger('cliente_idcliente');
            $table->unsignedBigInteger('veiculo_idveiculo');
            $table->timestamps();

            $table->foreign('equipe_idequipe')
                  ->references('idequipe')
                  ->on('equipes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('cliente_idcliente')
                  ->references('idcliente')
                  ->on('clientes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('veiculo_idveiculo')
                  ->references('idveiculo')
                  ->on('veiculos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordem_servicos');
    }
}
