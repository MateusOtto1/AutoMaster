<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePecaTable extends Migration
{
    public function up()
    {
        Schema::create('pecas', function (Blueprint $table) {
            $table->id('idpeca');
            $table->string('tipo_peca');
            $table->float('preco');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pecas');
    }
}
