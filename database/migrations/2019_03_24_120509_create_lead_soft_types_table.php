<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadSoftTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lead_soft_types');
        Schema::create('lead_soft_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('related_proposal_id')->unsigned();
            $table->string('name');
            $table->integer('order');
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
        Schema::dropIfExists('lead_soft_types');
    }
}
