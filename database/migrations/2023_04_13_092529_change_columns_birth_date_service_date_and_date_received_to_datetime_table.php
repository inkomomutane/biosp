<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsBirthDateServiceDateAndDateReceivedToDatetimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benificiaries', function (Blueprint $table) {
            $table->dateTime('birth_date')->nullable()->change();
            $table->dateTime('service_date')->nullable()->change();
            $table->dateTime('date_received')->nullable()->change();
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
            //
        });
    }
}
