<?php

namespace App\ThrustHelpers\Fields;

use BadChoice\Thrust\Fields\Field;

class Status extends Field
{
    public function displayInIndex($lead)
    {
        return "<a class='label lead-status-{$lead->status()->key}' href=''>{$lead->status()->name}</a>";
    }

    public function displayInEdit($object, $inline = false)
    {
        return '';
    }
}
