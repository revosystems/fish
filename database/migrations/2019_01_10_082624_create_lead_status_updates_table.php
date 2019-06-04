<?php

use App\Models\Lead;
use App\Models\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadStatusUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_status_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('new_status')->default(Status::NEW);
            $table->text('body')->nullable();
            $table->unsignedInteger('lead_id')->unsigned();
            $table->unsignedInteger('user_id')->unsigned();
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
        Schema::dropIfExists('lead_status_updates');
    }
}
