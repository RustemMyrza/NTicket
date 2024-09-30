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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_card')->after('password')->nullable();
            $table->foreign('id_card')->references('id')->on('id_cards')->onDelete('cascade');
            $table->unsignedBigInteger('bank_card')->after('password')->nullable();
            $table->foreign('bank_card')->references('id')->on('bank_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
