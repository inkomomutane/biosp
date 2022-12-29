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
        Schema::create('benificiaries', function (Blueprint $table) {
            $table->comment('Benificiares of certia Biosp.');
            $table->uuid('uuid')->primary();
            $table->string('full_name')->nullable();
            $table->integer('number_of_visits')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('service_date')->nullable();
            $table->boolean('home_care')->nullable();
            $table->timestamp('date_received')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps(6);
            $table->string('other_document_type')->nullable();
            $table->string('other_reason_opening_case')->nullable();
            $table->string('other_forwarded_service')->nullable();
            $table->string('specify_purpose_of_visit')->nullable();
            $table->string('visit_proposes')->nullable();


            $table->foreignUuid('biosp_uuid')->nullable()->constrained('biosps', 'uuid');
            $table->foreignUuid('genre_uuid')->nullable()->constrained('genres', 'uuid');
            $table->foreignUuid('provenace_uuid')->nullable()->constrained('provenaces', 'uuid');
            $table->foreignUuid('reason_opening_case_uuid')->nullable()->constrained('reason_opening_cases', 'uuid');
            $table->foreignUuid('document_type_uuid')->nullable()->constrained('document_types', 'uuid');
            $table->foreignUuid('forwarded_service_uuid')->nullable()->constrained('forwarded_services', 'uuid');
            $table->foreignUuid('purpose_of_visit_uuid')->nullable()->constrained('purpose_of_visits', 'uuid');
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
};