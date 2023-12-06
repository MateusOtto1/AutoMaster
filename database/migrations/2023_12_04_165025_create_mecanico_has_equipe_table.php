<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicoHasEquipeTable extends Migration
{
    public function up()
    {
        Schema::create('equipe_mecanico', function (Blueprint $table) {
            $table->unsignedBigInteger('mecanico_idmecanico');
            $table->unsignedBigInteger('equipe_idequipe');
            $table->primary(['mecanico_idmecanico', 'equipe_idequipe']);

            $table->foreign('mecanico_idmecanico')
                  ->references('idmecanico')
                  ->on('mecanicos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('equipe_idequipe')
                  ->references('idequipe')
                  ->on('equipes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mecanico_has_equipes');
    }
}
