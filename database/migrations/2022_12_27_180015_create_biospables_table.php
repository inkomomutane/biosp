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
            $table->uuidMorphs('biospable');
            $table->foreignUuid('biosp_uuid')->nullable()->constrained('biosps', 'uuid')
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
