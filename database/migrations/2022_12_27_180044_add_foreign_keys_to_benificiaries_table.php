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
        Schema::table('benificiaries', function (Blueprint $table) {
            $table->foreign(['document_type_uuid'], 'fk_benificiaries_document_types1')->references(['uuid'])->on('document_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['forwarded_service_uuid'], 'fk_benificiaries_forwarded_services1')->references(['uuid'])->on('forwarded_services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['purpose_of_visit_uuid'], 'fk_benificiaries_purpose_of_visits1')->references(['uuid'])->on('purpose_of_visits')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['genre_uuid'], 'fk_biospdatabases_genres1')->references(['uuid'])->on('genres')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['provenace_uuid'], 'fk_biospdatabases_provenaces1')->references(['uuid'])->on('provenaces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['reason_opening_case_uuid'], 'fk_biospdatabases_reason_opening_cases1')->references(['uuid'])->on('reason_opening_cases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benificiaries', function (Blueprint $table) {
            $table->dropForeign('fk_benificiaries_document_types1');
            $table->dropForeign('fk_benificiaries_forwarded_services1');
            $table->dropForeign('fk_benificiaries_purpose_of_visits1');
            $table->dropForeign('fk_biospdatabases_genres1');
            $table->dropForeign('fk_biospdatabases_provenaces1');
            $table->dropForeign('fk_biospdatabases_reason_opening_cases1');
        });
    }
};
