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
            $table->string('related_proposal_id')->nullable();
            $table->string('name');
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('lead_proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_general_typologies');
    }
}
