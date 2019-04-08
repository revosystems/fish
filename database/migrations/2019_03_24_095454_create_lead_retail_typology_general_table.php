<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadRetailTypologyGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lead_retail_typology_general');
        Schema::create('lead_retail_typology_general', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_proposal_id')->unsigned();
            $table->string('related_proposal_id');
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
        Schema::dropIfExists('lead_retail_typology_general');
    }
}
