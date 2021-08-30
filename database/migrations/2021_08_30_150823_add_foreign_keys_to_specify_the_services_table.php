<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpecifyTheServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specify_the_services', function (Blueprint $table) {
            $table->foreign('benificiary_uuid', 'fk_biospdatabases_has_forwarded_services_biospdatabases1')->references('uuid')->on('benificiaries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('forwarded_service_uuid', 'fk_biospdatabases_has_forwarded_services_forwarded_services1')->references('uuid')->on('forwarded_services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specify_the_services', function (Blueprint $table) {
            $table->dropForeign('fk_biospdatabases_has_forwarded_services_biospdatabases1');
            $table->dropForeign('fk_biospdatabases_has_forwarded_services_forwarded_services1');
        });
    }
}
