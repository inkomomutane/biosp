<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecifyTheProposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specify_the_propose', function (Blueprint $table) {
            $table->string('purpose_of_visit_uuid')->index('fk_purpose_of_visits_has_biospdatabases_purpose_of_visits1_idx');
            $table->string('benificiary_uuid')->index('fk_purpose_of_visits_has_biospdatabases_biospdatabases1_idx');
            $table->string('specify_the_propose')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('uuid')->unique('uuid_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specify_the_propose');
    }
}
