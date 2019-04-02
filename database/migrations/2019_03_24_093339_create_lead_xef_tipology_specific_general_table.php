<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadXefTipologySpecificGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lead_xef_typology_specific');
        Schema::create('lead_xef_typology_specific', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('ordern');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_xef_typology_specific');
    }
}
