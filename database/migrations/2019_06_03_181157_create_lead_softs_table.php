<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadSoftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_softs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id')->unsigned()->nullable();
            $table->tinyInteger('soft');
            $table->foreign('lead_id')->references('id')->on('leads');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_softs');
    }
}
