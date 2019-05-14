<?php

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
            $table->integer('type')->nullable();
            $table->integer('type_segment_id')->nullable();
            $table->integer('general_typology_id')->nullable();
            $table->integer('xef_specific_typology_id')->nullable();
            $table->integer('property_quantity')->nullable()->default('0');
            $table->integer('xef_property_franchise_id')->nullable();
            $table->string('xef_property_spaces')->nullable();
            $table->integer('xef_property_capacity')->nullable()->default('0');
            $table->string('retail_property_spaces')->nullable();
            $table->integer('retail_property_staff_quantity')->nullable()->default('0');
            $table->integer('devices')->nullable();
            $table->text('devices_current')->nullable();
            $table->integer('xef_pos_critical_quantity')->nullable()->default('0');
            $table->integer('xef_cash_quantity')->nullable()->default('0');
            $table->integer('xef_printers_quantity')->nullable()->default('0');
            $table->boolean('xef_kds')->nullable()->default('0');
            $table->integer('xef_kds_quantity')->nullable()->default('0');
            $table->integer('pos_id')->nullable();
            $table->integer('retail_sale_mode_id')->nullable();
            $table->integer('retail_sale_location_id')->nullable();
            $table->integer('franchise_pos_external_id')->nullable();
            $table->integer('xef_pms_id')->nullable();
            $table->string('xef_pms_other')->nullable();
            $table->integer('erp_id')->nullable();
            $table->string('erp_other')->nullable();
            $table->string('xef_soft')->nullable();
            $table->string('xef_soft_other')->nullable();
            $table->string('retail_soft')->nullable();
            $table->string('retail_soft_other')->nullable();
            $table->integer('status')->default(Lead::STATUS_NEW);
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
