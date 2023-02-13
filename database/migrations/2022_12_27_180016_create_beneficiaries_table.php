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
    public function up(): void
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->comment('Beneficiaries of certain Biosp.');
            $table->ulid('ulid')->primary();
            $table->string('full_name')->nullable();
            $table->integer('number_of_visits')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('service_date')->nullable();
            $table->boolean('home_care')->nullable();
            $table->timestamp('date_received')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps(precision: 6);
            $table->string('other_document_type')->nullable();
            $table->string('other_reason_opening_case')->nullable();
            $table->string('other_forwarded_service')->nullable();
            $table->string('specify_purpose_of_visit')->nullable();
            $table->string('visit_proposes')->nullable();

            $table->foreignUlid('biosp_ulid')->nullable()->constrained('biosps', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('genre_ulid')->nullable()->constrained('genres', 'ulid');
            $table->foreignUlid('provenance_ulid')->nullable()->constrained('provenances', 'ulid');
            $table->foreignUlid('reason_opening_case_ulid')->nullable()->constrained('reason_opening_cases', 'ulid');
            $table->foreignUlid('document_type_ulid')->nullable()->constrained('document_types', 'ulid');
            $table->foreignUlid('forwarded_service_ulid')->nullable()->constrained('forwarded_services', 'ulid');
            $table->foreignUlid('purpose_of_visit_ulid')->nullable()->constrained('purpose_of_visits', 'ulid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
