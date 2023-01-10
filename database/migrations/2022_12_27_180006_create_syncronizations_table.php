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
        Schema::create('syncronizations', function (Blueprint $table) {
            $table->comment('');
            $table->timestamp('last_sync_at')->nullable();
            $table->timestamps();
            $table->bigInteger('id', true);
            $table->uuid('user_uuid');
            $table->boolean('complete')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syncronizations');
    }
};
