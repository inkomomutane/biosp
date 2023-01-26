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
    public function up():void
    {
        Schema::create('biosp_send_mails', function (Blueprint $table) {
            $table->comment('responsible to store email to send reports');
            $table->foreignUlid('biosps_ulid')->constrained('biosps', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('send_mails_ulid')->constrained('send_mails', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() :void
    {
        Schema::dropIfExists('biosp_send_mails');
    }
};
