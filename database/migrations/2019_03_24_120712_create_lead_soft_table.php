<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadSoftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_soft', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product');
            $table->integer('soft_type_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->foreign('soft_type_id')->references('id')->on('lead_soft_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_soft');
    }
}
