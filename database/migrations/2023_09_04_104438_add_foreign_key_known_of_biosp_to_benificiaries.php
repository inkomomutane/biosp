<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyKnownOfBiospToBenificiaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benificiaries', function (Blueprint $table) {
            $table->string('known_of_biosp_uuid')->nullable();
            $table->foreign('known_of_biosp_uuid', 'fk_benificiaries_known_of_biosps1')
                ->references('uuid')
                ->on('known_of_biosps')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_benificiaries_known_of_biosps1');
        });
    }
}
