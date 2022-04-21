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
        Schema::create('brand_category', function (Blueprint $table) {
            
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("category_id");
            $table->primary("brand_id", "category_id");
            $table->foreign("brand_id")
                    ->references("id")
                    ->on("brands")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreign("category_id")
                    ->references("id")
                    ->on("categories")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("brand_category");
    }
};
