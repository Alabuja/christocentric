<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approves', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('artiste_id')->unsigned();
            $table->string('song_name');
            $table->text('download_link');
            $table->text('lyrics');
            $table->string('song_image');
            $table->string('slug')->unique();
            $table->string('file_url');
            $table->timestamps();

            $table->foreign('artiste_id')->references('id')->on('artistes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approves');
    }
}
