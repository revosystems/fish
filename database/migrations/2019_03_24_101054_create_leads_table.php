<?php

use App\Models\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Lead;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unsigned()->nullable();
            $table->unsignedInteger('organization_id')->unsigned()->nullable();
            $table->string('trade_name')->nullable();
            $table->string('name')->nullable();
            $table->string('surname1')->nullable();
            $table->string('surname2')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('city')->nullable();
            $table->tinyInteger('product')->nullable();
            $table->tinyInteger('type_segment')->nullable();
            $table->tinyInteger('general_typology')->nullable();
            $table->tinyInteger('property_spaces')->nullable();
            $table->integer('property_quantity')->nullable()->default('0');
            $table->integer('property_capacity')->nullable()->default('0');
            $table->boolean('property_franchise')->default(0);
            $table->integer('devices')->nullable();
            $table->text('devices_current')->nullable();
            $table->integer('xef_pos_critical_quantity')->nullable()->default('0');
            $table->integer('xef_cash_quantity')->nullable()->default('0');
            $table->integer('xef_printers_quantity')->nullable()->default('0');
            $table->boolean('xef_kds')->nullable()->default('0');
            $table->integer('xef_kds_quantity')->nullable()->default('0');
            $table->tinyInteger('pos')->nullable();
            $table->string('pos_other')->nullable();
            $table->tinyInteger('retail_sale_mode')->default(0)->nullable();
            $table->tinyInteger('retail_sale_location')->default(0)->nullable();
            $table->tinyInteger('can_use_another_pos')->default(0);
            $table->tinyInteger('xef_pms')->nullable();
            $table->string('xef_pms_other')->nullable();
            $table->tinyInteger('erp')->nullable();
            $table->string('erp_other')->nullable();
            $table->string('soft_other')->nullable();
            $table->tinyInteger('status')->default(Status::NEW);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organization_id')->references('id')->on('organizations');
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
        Schema::dropIfExists('leads');
    }
}
