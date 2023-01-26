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
        Schema::create('user_biosps', function (Blueprint $table) {
            $table->foreignUlid('user_ulid')->constrained('users', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('biosp_ulid')->constrained('biosps', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_biosps');
    }
};
