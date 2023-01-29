<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('ingredient_id')->nullable()->constrained('ingredients')->onDelete('set null');
            $table->foreignId('meal_id')->nullable()->constrained('meals')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_meals');
    }
};
