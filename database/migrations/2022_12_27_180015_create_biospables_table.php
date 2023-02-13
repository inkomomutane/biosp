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
        Schema::create('biospables', function (Blueprint $table) {
            $table->comment('Relation of all services of biosp');
            $table->ulidMorphs('biospable');
            $table->foreignUlid('biosp_ulid')->nullable()->constrained('biosps', 'ulid')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biospables');
    }
};
