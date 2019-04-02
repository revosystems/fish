<?php

namespace App\ThrustHelpers\Fields;

use BadChoice\Thrust\Fields\Field;

class Status extends Field
{
    public function displayInIndex($lead)
    {
        //$link = route('leads.show', $lead);
        $link = ''; //todo
        return "<a class='label lead-status-{$lead->statusName()}' href='{$link}'>".__('admin.'.$lead->statusName()).' </a>';
    }

    public function displayInEdit($object, $inline = false)
    {
        return '';
    }
}
