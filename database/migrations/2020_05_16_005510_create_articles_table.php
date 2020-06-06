<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
  Schema::create('articles', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('title');
    $table->date('subheader');
    $table->mediumText('Typography');
    $table->longText('TypographyParagraph');
    
    

    $table->string('moreIcon');
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
        Schema::dropIfExists('articles');
    }
}
