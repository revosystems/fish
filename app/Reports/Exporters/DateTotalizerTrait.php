<?php

namespace App\Reports\Exporters;

use BadChoice\Reports\Exporters\Field\ExportField;

trait DateTotalizerTrait
{
    protected $groupByDate;
    protected function getDateTotalizeFields($field = 'created_at')
    {
        $this->groupByDate  = $this->getFilter("groupByDate");
        return [
            ExportField::make($field, trans_choice("reports.day", 1))         ->ignoreWhen(! $this->isGroupedByDate('day'))                   ->transform('dateDay')  ->hideMobile(),
            ExportField::make($field, trans_choice("reports.month", 1))       ->ignoreWhen(! $this->isGroupedByDate(['day', 'month']))        ->transform('dateMonth')->hideMobile(),
            ExportField::make($field, trans_choice("reports.year", 1))        ->ignoreWhen(! $this->isGroupedByDate(['day', 'month', 'week']))->transform('dateYear') ->hideMobile(),
            ExportField::make($field, trans_choice("reports.week", 1))        ->ignoreWhen(! $this->isGroupedByDate('week'))                  ->transform('dateWeek') ->hideMobile(),
            ExportField::make($field, trans_choice("reports.dayOfWeek", 1))   ->ignoreWhen(! $this->isGroupedByDate('dayOfWeek'))             ->transform('dayOfWeek')->hideMobile(),
        ];
    }

    protected function isGroupedByDate($groupKeys)
    {
        return collect($groupKeys)->contains($this->groupByDate);
    }
}
