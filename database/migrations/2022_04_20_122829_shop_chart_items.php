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
        Schema::create('shop_cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("chart_id");
            $table->unsignedBigInteger("product_id");
            
            $table->foreign("chart_id")
                    ->references("id")
                    ->on("shop_charts")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            
            $table->foreign("product_id")
                    ->references("id")
                    ->on("products")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            
            $table->unsignedInteger("product_count")->default(1);
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
