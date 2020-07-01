<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{

    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('points');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('codes');
    }
}
