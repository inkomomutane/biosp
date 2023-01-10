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
        Schema::create('biosp_servicos', function (Blueprint $table) {
            $table->comment('');
            $table->uuid('uuid')->primary();
            $table->timestamps();
            $table->string('model_type')->nullable();
            $table->uuid('model_id')->nullable();
            $table->string('table')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biosp_servicos');
    }
};
