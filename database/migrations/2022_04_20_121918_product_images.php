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
         Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")
                    ->references("id")
                    ->on("products")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->char("image_url", 255)->default("default/image.png");
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
        //
    }
};
