<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiospdatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biospdatabases', function (Blueprint $table) {
            $table->string('uuid')->primary();
            $table->string('full_name')->nullable();
            $table->integer('number_of_visits')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('service_date')->nullable();
            $table->string('professional_qualification')->nullable();
            $table->string('specify_service')->nullable();
            $table->boolean('home_care')->nullable();
            $table->string('purpose_of_visit')->nullable();
            $table->date('date_received')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('genre_id')->index('fk_biospdatabases_genres_idx');
            $table->unsignedBigInteger('addresse_id')->index('fk_biospdatabases_addresses1_idx');
            $table->unsignedBigInteger('province_id')->index('fk_biospdatabases_province1_idx');
            $table->unsignedBigInteger('reason_opening_case_id')->index('fk_biospdatabases_reason_opening_cases1_idx');
            $table->unsignedBigInteger('document_type_id')->index('fk_biospdatabases_document_types1_idx');
            $table->unsignedBigInteger('forwarded_service_id')->index('fk_biospdatabases_forwarded_services1_idx');
            $table->unsignedBigInteger('purpose_of_visit_id')->index('fk_biospdatabases_purpose_of_visits1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biospdatabases');
    }
}
