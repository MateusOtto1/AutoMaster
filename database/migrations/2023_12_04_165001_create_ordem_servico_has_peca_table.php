<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicoHasPecaTable extends Migration
{
    public function up()
    {
        Schema::create('ordem_servico_has_pecas', function (Blueprint $table) {
            $table->unsignedBigInteger('ordem_servico_idordem_servico');
            $table->unsignedBigInteger('peca_idpeca');
            $table->primary(['ordem_servico_idordem_servico', 'peca_idpeca']);

            $table->foreign('ordem_servico_idordem_servico')
                  ->references('idordem_servico')
                  ->on('ordem_servicos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('peca_idpeca')
                  ->references('idpeca')
                  ->on('pecas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordem_servico_has_pecas');
    }
}
