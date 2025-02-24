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
        Schema::table('register_camps', function (Blueprint $table) {
            //
            $table->dropColumn('location');
            $table->dropColumn('sport_type');
            $table->bigInteger('camp_level_id')->unsigned()->nullable()->after('camp_id');
            $table->foreign('camp_level_id')->references('id')->on('camp_levels')->onDelete('cascade');
            $table->bigInteger('camp_sport_id')->unsigned()->nullable()->after('camp_level_id');
            $table->foreign('camp_sport_id')->references('id')->on('camp_sports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_camps', function (Blueprint $table) {
            //
        });
    }
};
