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
        Schema::create('visitors', function (Blueprint $table) {
            $table->string('visitor_id', 256)->primary();
            $table->string('ip', 30);
            $table->string('city', 100);
            $table->string('country', 30);
            $table->string('system', 50);
            $table->string('browser', 20);
            $table->string('browser_version', 30);
            $table->integer('visits')->default(0);
            $table->integer('chats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
