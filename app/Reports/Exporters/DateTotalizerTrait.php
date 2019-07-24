<?php

namespace App\Reports\Exporters;

use BadChoice\Reports\Exporters\Field\ExportField;

trait DateTotalizerTrait
{
    protected function getDateTotalizeFields($field = 'created_at')
    {
        $totalize = $this->getFilter("totalize");
        return [
            ExportField::make($field, trans_choice("reports.day", 1))         ->ignoreWhen($totalize != 'day')                        ->transform('dateDay')  ->hideMobile(),
            ExportField::make($field, trans_choice("reports.week", 1))         ->ignoreWhen($totalize != 'week')                      ->transform('dateWeek')  ->hideMobile(),
            ExportField::make($field, trans_choice("reports.month", 1))       ->ignoreWhen($totalize != 'day' && $totalize != 'month')->transform('dateMonth')->hideMobile(),
            ExportField::make($field, trans_choice("reports.year", 1))        ->ignoreWhen($totalize != 'day' && $totalize != 'week' && $totalize != 'month')->transform('dateYear') ->hideMobile(),
            ExportField::make($field, trans_choice("reports.dayOfWeek", 1))   ->ignoreWhen($totalize != 'dayOfWeek')                  ->transform('dayOfWeek')->hideMobile(),
        ];
    }
}
