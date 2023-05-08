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
        Schema::create('about_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('city')->nullable();
            $table->index('city');
            $table->string('platform')->nullable();
            $table->index('platform');
            $table->string('device')->nullable();
            $table->index('device');
            $table->string('browser')->nullable();
            $table->index('browser');
            $table->string('language')->nullable();
            $table->index('language');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_users');
    }
};
