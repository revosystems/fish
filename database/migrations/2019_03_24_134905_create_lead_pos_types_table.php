<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadPosTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_pos_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('related_proposal_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->foreign('related_proposal_id')->references('id')->on('lead_proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_pos_types');
    }
}
