<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenificiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benificiaries', function (Blueprint $table) {
            $table->string('uuid')->unique('uuid_UNIQUE');
            $table->string('full_name')->nullable();
            $table->integer('number_of_visits')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('service_date')->nullable();
            $table->boolean('home_care')->nullable();
            $table->timestamp('date_received')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('other_document_type')->nullable();
            $table->string('other_reason_opening_case')->nullable();
            $table->string('forwarded_correct_service_uuid')->nullable()->index('fk_biospdatabases_forwarded_correct_services1_idx');
            $table->string('other_forwarded_service')->nullable();
            $table->string('specify_forwarded_service')->nullable();
            $table->string('visit_proposes')->nullable();
            $table->string('neighborhood_uuid')->nullable()->index('fk_biospdatabases_neighborhoods1_idx');
            $table->string('genre_uuid')->nullable()->index('fk_biospdatabases_genres1_idx');
            $table->string('provenace_uuid')->nullable()->index('fk_biospdatabases_provenaces1_idx');
            $table->string('reason_opening_case_uuid')->nullable()->index('fk_biospdatabases_reason_opening_cases1_idx');
            $table->string('document_type_uuid')->nullable()->index('fk_benificiaries_document_types1_idx');
            $table->string('forwarded_service_uuid')->nullable()->index('fk_benificiaries_forwarded_services1_idx');
            $table->string('purpose_of_visit_uuid')->nullable()->index('fk_benificiaries_purpose_of_visits1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benificiaries');
    }
}
