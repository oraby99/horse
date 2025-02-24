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
        Schema::create('register_camps', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('age')->nullable();
            $table->string('location')->nullable();
            $table->string('sport_type')->nullable();
            $table->string('rider_level')->nullable();
            $table->boolean('ride_with_trainer')->nullable();
            $table->boolean('have_horse')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('camp_id')->unsigned();
            $table->foreign('camp_id')->references('id')->on('camps')->onDelete('cascade');
            $table->bigInteger('camp_level_id')->unsigned();
            $table->foreign('camp_level_id')->references('id')->on('camp_levels')->onDelete('cascade');
            $table->bigInteger('camp_sport_id')->unsigned();
            $table->foreign('camp_sport_id')->references('id')->on('camp_sports')->onDelete('cascade');
            $table->double('total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_camps');
    }
};
