<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadPropertySpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lead_property_spaces');
        Schema::create('lead_property_spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_type_id')->unsigned();
            $table->string('name');
            $table->integer('ordern');
            $table->timestamps();
            $table->foreign('lead_type_id')->references('id')->on('lead_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_property_spaces');
    }
}
