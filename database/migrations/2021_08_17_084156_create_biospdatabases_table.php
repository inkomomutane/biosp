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
            $table->timestamp('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('service_date')->nullable();
            $table->boolean('home_care')->nullable();
            $table->string('purpose_of_visit')->nullable();
            $table->timestamp('date_received')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('document_types_id')->index('fk_biospdatabases_document_types1_idx');
            $table->unsignedBigInteger('genres_id')->index('fk_biospdatabases_genres1_idx');
            $table->unsignedBigInteger('addresses_id')->index('fk_biospdatabases_addresses1_idx');
            $table->unsignedBigInteger('forwarded_services_id')->index('fk_biospdatabases_forwarded_services1_idx');
            $table->unsignedBigInteger('reason_opening_cases_id')->index('fk_biospdatabases_reason_opening_cases1_idx');
            $table->unsignedBigInteger('purpose_of_visits_id')->index('fk_biospdatabases_purpose_of_visits1_idx');
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
