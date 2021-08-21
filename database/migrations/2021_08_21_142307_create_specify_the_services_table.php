<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecifyTheServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specify_the_services', function (Blueprint $table) {
            $table->string('benificiary_uuid')->index('fk_biospdatabases_has_forwarded_services_biospdatabases1_idx');
            $table->string('forwarded_service_uuid')->index('fk_biospdatabases_has_forwarded_services_forwarded_services_idx');
            $table->string('specify_the_service')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('specify_the_services');
    }
}
