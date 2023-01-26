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
        Schema::create('biosps', function (Blueprint $table) {
            $table->comment('');
            $table->ulid('ulid')->primary();
            $table->softDeletes();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('project_name')->nullable();
            $table->foreignUlid('neighborhood_ulid')->constrained('neighborhoods', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biosps');
    }
};
