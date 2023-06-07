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
        /**
        * this table is craated to cover
         * if the visitor more than one or
         * she/he has another person
        */
        Schema::create('visitors_to_visit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_visit')->constrained('visitations');
            $table->foreignId('visitor_id')->nullable()
                ->constrained('users');
            $table->text('visitor_name');
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
        Schema::dropIfExists('visitors_to_visits');
    }
};
