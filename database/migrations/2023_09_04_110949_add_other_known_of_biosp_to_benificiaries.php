<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherKnownOfBiospToBenificiaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benificiaries', function (Blueprint $table) {
            $table->string('other_known_of_biosp')->nullable();
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
            $table->dropColumn('other_known_of_biosp');
        });
    }
}
