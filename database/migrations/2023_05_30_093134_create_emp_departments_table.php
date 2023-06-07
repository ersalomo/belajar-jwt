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
        Schema::create('emp_departments', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->string('kode_emp')->unique();
            $table->string('title');
            $table->timestamps();
            $table->primary('emp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_departments');
    }
};
