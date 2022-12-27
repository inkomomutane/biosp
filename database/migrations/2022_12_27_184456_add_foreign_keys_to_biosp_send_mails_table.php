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
        Schema::table('biosp_send_mails', function (Blueprint $table) {
            $table->foreign(['biosps_uuid'])->references(['uuid'])->on('biosps')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['send_mails_uuid'])->references(['uuid'])->on('send_mails')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biosp_send_mails', function (Blueprint $table) {
            $table->dropForeign('biosp_send_mails_biosps_uuid_foreign');
            $table->dropForeign('biosp_send_mails_send_mails_uuid_foreign');
        });
    }
};
