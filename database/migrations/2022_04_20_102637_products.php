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
         Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name")->default("Product Name");
            $table->string("product_image")->default("image/image.png");
            $table->string("product_desc")->default("Product Desc");
            $table->float("product_price", 5, 2);
            $table->integer("product_sale")->default(0);
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
