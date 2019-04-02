<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

    use Taggable;

    const STATUS_NEW           = 1;
    const STATUS_FIRST_CONTACT = 2;
    const STATUS_VISITED       = 3;
    const STATUS_COMPLETED     = 4;
    const STATUS_FAILED        = 5;

	protected $fillable = array(
		'user_id',
		'organization_id',
		'trade_name',
		'name',
        'surname1',
        'surname2',
		'email',
		'phone',
		'city',
		'type',
		'type_segment',
		'xef_typology_general',
		'xef_typology_specific',
		'retail_typology_general',
		'xef_property_quantity',
		'xef_property_franchise',
		'xef_property_spaces',
		'xef_property_capacity',
		'retail_property_quantity',
		'retail_property_spaces',
		'retail_property_staff_quantity',
		'devices',
		'devices_current',
		'xef_pos_critical_quantity',
		'xef_cash_quantity',
		'xef_printers_quantity',
		'xef_kds',
		'xef_kds_quantity',
		'pos',
		'retail_sale_mode',
        'retail_sale_location',
        'franchise_pos_external',
        'xef_pms',
        'xef_pms_other',
        'erp',
        'erp_other',
        'xef_soft',
        'xef_soft_other',
        'retail_soft',
        'retail_soft_other',
        'status',
	);


    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typeV()
    {
        return $this->hasOne(LeadType::class,'id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function statusName()
    {
        return static::getStatusText($this->status);
    }

    public static function getStatusText($status)
    {
        return static::availableStatus()[$status];
    }

    public static function availableStatus()
    {
        return [
            static::STATUS_NEW           => 'new',
            static::STATUS_FIRST_CONTACT => 'first-contact',
            static::STATUS_VISITED       => 'visited',
            static::STATUS_COMPLETED     => 'completed',
            static::STATUS_FAILED        => 'failed',
        ];
    }

}
