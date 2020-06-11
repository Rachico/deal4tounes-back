<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_details', function (Blueprint $table) {
            $table->uuid('id');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');

            $table->integer('points')->nullable();
            $table->string('phone');

            $table->uuid('client_id');

            $table->timestamps();

            $table->primary('id');
            $table->foreign('client_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_details');
    }
}
