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
        Schema::create('biosp_send_mails', function (Blueprint $table) {
            $table->comment('');
            $table->string('biosps_uuid');
            $table->string('send_mails_uuid');
            $table->string('uuid')->primary();
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
        Schema::dropIfExists('biosp_send_mails');
    }
};
