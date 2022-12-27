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
            $table->string('user_uuid')->index('fk_user_biosps_user_uuid1_idx');
            $table->string('biosp_uuid')->index('fk_user_biosps_biosp_uuid1_idx');
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
