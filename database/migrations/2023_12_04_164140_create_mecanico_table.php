<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicoTable extends Migration
{
    public function up()
    {
        Schema::create('mecanicos', function (Blueprint $table) {
            $table->id('idmecanico');
            $table->string('nome');
            $table->string('especialidade');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mecanicos');
    }
}
