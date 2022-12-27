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
        Schema::table('biosps', function (Blueprint $table) {
            $table->foreign(['neighborhood_uuid'], 'fk_biosps_neighborhoods1')->references(['uuid'])->on('neighborhoods')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biosps', function (Blueprint $table) {
            $table->dropForeign('fk_biosps_neighborhoods1');
        });
    }
};
