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
        Schema::table('visitations', function (Blueprint $table) {
            $table->time('checkin_at')->default('09:00:00');
            $table->time('checkout_at')->default('16:00:00');
            $table->unsignedBigInteger('approved_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitations', function (Blueprint $table) {
            $table->dropColumn("checkin_at");
            $table->dropColumn("checkout_at");
            $table->dropColumn("approved_by");
        });
    }
};
