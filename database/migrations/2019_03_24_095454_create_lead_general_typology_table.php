<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadGeneralTypologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('lead_general_typologies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->integer('proposal_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('lead_proposals');
        });

        Schema::create('general_typologies_related_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('related_proposal_id')->unsigned();
            $table->integer('general_typology_id')->unsigned();
            $table->timestamps();

            $table->foreign('related_proposal_id')->references('id')->on('lead_proposals');
            $table->foreign('general_typology_id')->references('id')->on('lead_general_typologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_general_typologies_related_proposals');
        Schema::dropIfExists('lead_general_typologies');
    }
}
