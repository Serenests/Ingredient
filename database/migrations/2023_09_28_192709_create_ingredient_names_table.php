<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredient_names', function (Blueprint $table) {
            $table->id();
            $table->string("name_eng");
            $table->string("name_th");
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('ingredient_types');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('unit_of_measurements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_names');
        Schema::table('ingredient_names', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
