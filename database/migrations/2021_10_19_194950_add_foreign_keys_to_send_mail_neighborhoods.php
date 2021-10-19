<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSendMailNeighborhoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('send_mail_neighborhoods', function (Blueprint $table) {
            $table->foreign('neighborhood_uuid', 'fk_biospdatabases_neighborhoods_mail_idx')->references('uuid')->on('neighborhoods')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('send_mail_uuid', 'fk_biospdatabases_send_mail_idx')->references('uuid')->on('send_mails')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('send_mail_neighborhoods', function (Blueprint $table) {
            $table->dropForeign('fk_biospdatabases_neighborhoods_mail_idx');
            $table->dropForeign('fk_biospdatabases_send_mail_idx');
        });
    }
}
