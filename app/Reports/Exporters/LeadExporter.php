<?php

namespace App\Reports\Exporters;

use App\Models\GeneralTypology;
use App\Models\Product;
use App\Models\PropertySpace;
use App\Models\TypeSegment;
use BadChoice\Reports\Exporters\Field\ExportField;

class LeadExporter extends ReportExporter
{
    use DateTotalizerTrait;
    protected $availableGroupedKeys = [
        "product",
        'type_segment',
        'general_typology',
        'property_spaces',
        'property_franchise',
        "user_id",
        "status",
    ];

    protected function getFields()
    {
        $this->groupBy      = collect($this->getFilter("groupBy"));
        return array_merge([
            ExportField::make("quantity", trans_choice('reports.lead', 2))  ->sortable()            ->ignoreWhen(! $this->isGrouped()),
            ExportField::make("id", trans_choice('reports.id', 1))              ->sortable()->ignoreWhen($this->isGrouped())->only('html')->transform('link', ['url' => 'admin/leads/{id}/showMore', 'icon' => 'eye']),
            ExportField::make("id", trans_choice('reports.id', 1))              ->sortable()->ignoreWhen($this->isGrouped())->except('html'),
            ExportField::make("product", trans_choice('reports.product', 1))    ->sortable()->ignoreWhen($this->isGroupedOrFilterBy('product'))->transform('callback', function ($product) {
                return Product::find($product)->name;
            }),
            ExportField::make("type_segment", trans_choice('reports.type_segment', 1))    ->sortable()->ignoreWhen($this->isGroupedOrFilterBy('type_segment'))->transform('callback', function ($typeSegment) {
                return TypeSegment::find($typeSegment)->name;
            }),
            ExportField::make("general_typology", trans_choice('reports.general_typology', 1))    ->sortable()->ignoreWhen($this->isGroupedOrFilterBy('general_typology'))->transform('callback', function ($generalTypology) {
                return GeneralTypology::find($generalTypology)->name;
            }),
            ExportField::make("property_spaces", trans_choice('reports.property_spaces', 1))    ->sortable()->ignoreWhen($this->isGroupedOrFilterBy('property_spaces'))->transform('callback', function ($propertySpace) {
                return PropertySpace::find($propertySpace)->name;
            }),
            ExportField::make("property_franchise", trans_choice('reports.property_franchise', 1))    ->sortable()->ignoreWhen($this->isGroupedOrFilterBy('property_franchise'))->transform('callback', function ($isPropertyFranchise) {
                return $isPropertyFranchise ? __('reports.yes') : __('reports.no');
            }),
            ExportField::make("property_capacity", trans_choice('reports.property_capacity', 1))->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("probability", trans_choice('reports.probability', 1))->sortable()->transform('percentage')->ignoreWhen($this->isGrouped()),
            ExportField::make("total", trans_choice('reports.total', 1))->sortable()->transform('decimal'),
            ExportField::make("total_devices", trans_choice('reports.totalDevices', 1))->sortable(),
            ExportField::make("name", trans_choice('reports.name', 1))          ->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("surname1", trans_choice('reports.surname1', 1))  ->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("surname2", trans_choice('reports.surname2', 1))  ->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("email", trans_choice('reports.email', 1))        ->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("phone", trans_choice('reports.phone', 1))        ->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("city", trans_choice('reports.city', 1))          ->sortable()->ignoreWhen($this->isGrouped()),
            ExportField::make("userName", trans_choice('reports.user', 1))      ->sortable()->ignoreWhen($this->isGroupedOrFilterBy('user_id')),

            ExportField::make("devices", trans_choice('reports.device', 2))          ->sortable(),
            ExportField::make("trade_name", trans_choice('reports.tradeName', 1))          ->sortable()->ignoreWhen($this->isGrouped()),

            ExportField::make("status", trans_choice('reports.status', 1))      ->sortable()->transform("callObjectMethod", 'statusName')->ignoreWhen($this->isGroupedOrFilterBy('status')),
            ExportField::make('created_at', trans_choice("reports.created", 1)) ->sortable()->transform('datetime')->ignoreWhen($this->isGrouped())->hideMobile(),
            ExportField::make('updated_at', trans_choice("reports.updated", 1)) ->sortable()->transform('datetime')->ignoreWhen($this->isGrouped())->hideMobile(),
        ], $this->getDateTotalizeFields());
    }

    protected function isGrouped()
    {
        return $this->groupByDate || parent::isGrouped();
    }

    protected function isGroupedOrFilterBy($key)
    {
        return ($this->isGrouped() && ! $this->isGroupedBy($key)) || $this->getFilter($key);
    }
}
