<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
         
            $table->bigIncrements('id'); 
            $table->mediumText('text');
            
            $table->unsignedBigInteger('action_id');
            $table->char('User_id',36);
           
            $table->timestamps();
           
            $table->foreign('User_id')
            ->references('id')
            ->on('users')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
