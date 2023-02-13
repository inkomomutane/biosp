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
    public function up(): void
    {
        Schema::create('user_biosps', function (Blueprint $table) {
            $table->foreignUlid('user_ulid')->constrained('users', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('biosp_ulid')->constrained('biosps', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_biosps');
    }
};
