<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'pictures',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('recipe_id');
                $table->string('img_path');
                $table->timestamps();

                $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}
