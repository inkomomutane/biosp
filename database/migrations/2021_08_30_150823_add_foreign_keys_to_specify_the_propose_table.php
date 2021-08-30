<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpecifyTheProposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specify_the_propose', function (Blueprint $table) {
            $table->foreign('benificiary_uuid', 'fk_purpose_of_visits_has_biospdatabases_biospdatabases1')->references('uuid')->on('benificiaries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('purpose_of_visit_uuid', 'fk_purpose_of_visits_has_biospdatabases_purpose_of_visits1')->references('uuid')->on('purpose_of_visits')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specify_the_propose', function (Blueprint $table) {
            $table->dropForeign('fk_purpose_of_visits_has_biospdatabases_biospdatabases1');
            $table->dropForeign('fk_purpose_of_visits_has_biospdatabases_purpose_of_visits1');
        });
    }
}
