<?php

namespace App\Reports;

class ReportFactory
{
    /**
     * @param $type
     * @return \BadChoice\Reports\Report
     */
    public static function reportFor($type) {
        {
            $class = "\\App\\Reports\\" . ucfirst($type) . "Report";
            if (! class_exists($class)) {
                return null;
            }
            return new $class;
        }
    }
}
