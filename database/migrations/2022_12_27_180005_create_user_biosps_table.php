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
            $table->string('uuid')->primary();
            $table->foreignUuid('user_uuid')->constrained('users','uuid');
            $table->foreignUuid('biosp_uuid')->constrained('biosps','uuid');
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