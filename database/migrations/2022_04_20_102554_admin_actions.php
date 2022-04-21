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
        Schema::create('admin_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("admin_log_id");
            $table->foreign("admin_log_id")
                    ->references("id")
                    ->on("admin_logs")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")
                    ->references("id")
                    ->on("admins")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->char("action_url", 255)->default("");
            $table->text("action_body")->default("");
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
        Schema::dropIfExists('admin_actions');
    }
};
