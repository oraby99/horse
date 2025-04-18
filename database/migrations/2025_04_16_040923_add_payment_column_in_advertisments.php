<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('advertisments', function (Blueprint $table) {
            $table->string('payment_method')->nullable();
            $table->enum('payment_status',['success','fail','pending'])->default('pending');
            $table->string('order_number')->nullable();
            $table->double('amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('advertisments', function (Blueprint $table) {
            //
        });
    }
};
