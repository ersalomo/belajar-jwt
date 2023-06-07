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
            $table->foreignId('visitor_id')->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name_emp');
            $table->text('purpose')->nullable();
            $table->date('visit_date')->nullable();
            $table->string('company_name')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('transportation')->nullable();
            $table->string('type')->default('personal');
            $table->string('status')->default('pending');
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
