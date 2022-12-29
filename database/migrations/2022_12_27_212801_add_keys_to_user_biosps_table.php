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
        Schema::table('user_biosps', function (Blueprint $table) {
            $table->foreign(['biosp_uuid'], 'fk_user_biosps_biosp_uuid1')->references(['uuid'])->on('biosps')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_uuid'], 'fk_user_biosps_user_uuid1')->references(['uuid'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_biosps', function (Blueprint $table) {
            $table->dropForeign('fk_user_biosps_biosp_uuid1');
            $table->dropForeign('fk_user_biosps_user_uuid1');
        });
    }
};
