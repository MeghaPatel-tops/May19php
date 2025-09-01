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
        Schema::create('appuser', function (Blueprint $table) {
            $table->id('uid');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('contact');
            $table->string('profileimg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appuser');
    }
};
