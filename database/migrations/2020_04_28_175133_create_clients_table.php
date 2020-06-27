<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('dni')->unique();
            $table->double('phone')->nullable()->default('00000000');
            $table->string('adress',70)->nullable()->default('No registrado');
            $table->string('socialNetwork',70)->nullable()->default('No registrado');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}