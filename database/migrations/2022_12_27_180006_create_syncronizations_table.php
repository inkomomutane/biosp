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
    public function up(): void
    {
        Schema::create('synchronizations', callback: function (Blueprint $table): void {
            $table->comment('');
            $table->timestamp('last_sync_at')->nullable();
            $table->timestamps();
            $table->bigInteger('id', true);
            $table->ulid('user_ulid');
            $table->boolean('complete')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('synchronizations');
    }
};
