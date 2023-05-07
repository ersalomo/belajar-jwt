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
        Schema::create('image_identification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitor_id')->constrained('users');
            $table->text('image_size');
            $table->text('image_name');
            $table->text('image_base64');
            $table->text('image_descriptor');
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
        Schema::dropIfExists('image_identification');
    }
};
