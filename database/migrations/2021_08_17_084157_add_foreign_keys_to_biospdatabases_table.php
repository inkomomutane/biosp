<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBiospdatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biospdatabases', function (Blueprint $table) {
            $table->foreign('addresses_id', 'fk_biospdatabases_addresses1')->references('id')->on('addresses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('document_types_id', 'fk_biospdatabases_document_types1')->references('id')->on('document_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('forwarded_services_id', 'fk_biospdatabases_forwarded_services1')->references('id')->on('forwarded_services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('genres_id', 'fk_biospdatabases_genres1')->references('id')->on('genres')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('purpose_of_visits_id', 'fk_biospdatabases_purpose_of_visits1')->references('id')->on('purpose_of_visits')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('reason_opening_cases_id', 'fk_biospdatabases_reason_opening_cases1')->references('id')->on('reason_opening_cases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biospdatabases', function (Blueprint $table) {
            $table->dropForeign('fk_biospdatabases_addresses1');
            $table->dropForeign('fk_biospdatabases_document_types1');
            $table->dropForeign('fk_biospdatabases_forwarded_services1');
            $table->dropForeign('fk_biospdatabases_genres1');
            $table->dropForeign('fk_biospdatabases_purpose_of_visits1');
            $table->dropForeign('fk_biospdatabases_reason_opening_cases1');
        });
    }
}
