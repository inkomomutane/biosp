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
            $table->string('neighborhood_uuid')->index('fk_biospdatabases_neighborhoods1_idx');
            $table->string('genre_uuid')->index('fk_biospdatabases_genres1_idx');
            $table->string('provenace_uuid')->index('fk_biospdatabases_provenaces1_idx');
            $table->string('reason_opening_case_uuid')->index('fk_biospdatabases_reason_opening_cases1_idx');
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
