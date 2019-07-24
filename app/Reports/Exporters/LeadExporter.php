<?php

namespace App\Reports\Exporters;

use BadChoice\Reports\Exporters\Field\ExportField;

class LeadExporter extends ReportExporter
{
    use DateTotalizerTrait;

    protected function getFields()
    {
        $totalize   = $this->getFilter("totalize");
        return array_merge([
            ExportField::make("quantity", trans_choice('reports.quantity', 1))            ->ignoreWhen(! $totalize), //->sortable(),
            ExportField::make("id", trans_choice('reports.id', 1))          ->sortable()->ignoreWhen($totalize),
            ExportField::make("name", trans_choice('reports.name', 1))      ->sortable()->ignoreWhen($totalize),
            ExportField::make("userName", trans_choice('reports.user', 1)) ->sortable()->ignoreWhen($totalize && $totalize != 'user' && $totalize != "dayAndUser" && $totalize != "monthAndUser"),
            ExportField::make("status", trans_choice('reports.status', 1))  ->sortable()->transform("callObjectMethod", 'statusName')->ignoreWhen($totalize && $totalize != "status"),
            ExportField::make('created_at', trans_choice('reports.day', 1))           ->transform("date") ->sortable()->ignoreWhen($totalize != 'id' && $totalize != "dayAndUser"),
            ExportField::make('created_at', trans_choice('reports.month', 1))         ->transform("month")            ->ignoreWhen($totalize != 'id' && $totalize != "monthAndUser"),
            ExportField::make("created_at", trans_choice("reports.created", 1))->sortable()->transform('datetime')->ignoreWhen($totalize)->hideMobile(),
            ExportField::make("updated_at", trans_choice("reports.updated", 1))->sortable()->transform('datetime')->ignoreWhen($totalize)->hideMobile(),
        ], $this->getDateTotalizeFields());
    }
}
