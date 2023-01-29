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
        Schema::create('meal_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('meal_id')->nullable()->constrained('meals')->onDelete('set null');
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_tags');
    }
};
