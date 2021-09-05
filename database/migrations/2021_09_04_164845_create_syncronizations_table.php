<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyncronizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syncronizations', function (Blueprint $table) {
            $table->timestamp('last_sync_at')->nullable();
            $table->timestamps();
            $table->bigInteger('id', true);
            $table->string('user_uuid');
            $table->boolean('complete')->nullable()->default(0);
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
}
