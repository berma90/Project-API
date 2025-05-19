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
        Schema::create('usernews', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('role');
            $table->string('kode_cabang', 50);
            $table->string('userlevel_id');
            $table->string('avatar')->nullable();
            $table->timestamps();

            $table->foreign('kode_cabang')->references('kode_cabang')->on('cabangs')->onDelete('cascade');
            $table->foreign('userlevel_id')->references('userlevel_id')->on('user_levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usernews');
    }
};
