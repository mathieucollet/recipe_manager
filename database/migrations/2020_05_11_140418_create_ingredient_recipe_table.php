<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'ingredient_recipe',
            function (Blueprint $table) {
                $table->unsignedBigInteger('ingredient_id');
                $table->unsignedBigInteger('recipe_id');
                $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
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
        Schema::dropIfExists('ingredient_recipe');
    }
}
