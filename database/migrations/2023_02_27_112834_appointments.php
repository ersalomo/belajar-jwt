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
        // online
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitor_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name_emp');
            $table->string('purpose')->nullable();
            $table->date('visit_date')->nullable();
            $table->string('company_name')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('transportation')->nullable();
            $table->string('visitation_type');
            $table->string('status')->default('pending');
            $table->time('arrival_time');
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
        Schema::dropIfExists('appointments');
    }
};
