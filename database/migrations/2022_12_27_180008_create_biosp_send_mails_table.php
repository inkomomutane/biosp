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
            $table->comment('responsabel to store email to send repports');
            $table->uuid('uuid')->primary();
            $table->foreignUuid('biosps_uuid')->constrained('biosps','uuid');
            $table->foreignUuid('send_mails_uuid')->constrained('send_mails','uuid');
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
