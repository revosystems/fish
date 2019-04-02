<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadXefTypologyGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lead_xef_typology_general');
        Schema::create('lead_xef_typology_general', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_proposal_id')->unsigned();
            $table->string('related_proposal_id')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->foreign('lead_proposal_id')->references('id')->on('lead_proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_xef_typology_general');
    }
}
