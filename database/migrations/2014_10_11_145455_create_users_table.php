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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone',30)->nullable()->unique();
            $table->text('address')->nullable();
            $table->text('picture')->nullable();
            $table->boolean('gender')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('remember_token');
            $table->string('password');
            $table->foreignId('role_id')
                ->default(4)
                ->constrained('roles');
            $table->integer('is_blocked')->default(0);
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
        Schema::dropIfExists('users');
    }
};
