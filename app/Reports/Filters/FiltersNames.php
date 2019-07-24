<?php

namespace App\Reports\Filters;

use App\Models\Product;
use App\Models\Status;
use App\Models\User;

class FiltersNames
{
    public static function getFilters()
    {
        return collect((new BaseFilters(request()))->filters());
    }

    public static function filtersDescriptions()
    {
        return static::getFilters()->map(function ($value, $key) {
            return static::getFilterDescription($key, $value);
        })->filter(function ($value) {
            return $value != null;
        });
    }

    public static function getFilterDescription($key, $value)
    {
        if ($value === null) {
            return null;
        }
        switch ($key) {
            case "user":        return trans_choice('reports.user', 1)    . ": " . static::namesOrDashes(User::class, $value);
            case "dayOfWeek":   return trans_choice('reports.dayOfWeek', 1)   . ": " . static::daysOfWeekNames($value);
            case "product":     return trans_choice('reports.product', 1)     . ": " . Product::find($value)->name;
            case "status":      return trans_choice('reports.status', 1)      . ": " . Status::text($value);
            case "start_date":  return null;
            case "end_date":    return null;
            case "sort_order":  return null;
            case "sort":        return null;
            case "page":        return null;
            case "totalize":    return trans_choice('reports.totalize', 1) . ": " . __("reports.{$value}");
            default:            return $key . "::" . $value;
        }
    }

    private static function namesOrDashes($model, $values)
    {
        return collect($values)->map(function ($value) use ($model) {
            return nameOrDash($model::find($value));
        })->implode(", ");
    }


    private static function daysOfWeekNames($values)
    {
        return collect($values)->map(function ($value) {
            return dayOfWeekName($value - 1);
        })->implode(", ");
    }
}
