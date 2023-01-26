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
            $table->ulid('ulid')->primary();
            $table->foreignUlid('biosps_ulid')->constrained('biosps', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('send_mails_ulid')->constrained('send_mails', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
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
