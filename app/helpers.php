<?php

function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'current' : '';
}

function icon($icon)
{
    return FA::icon($icon);
}

function nameOrDash($object)
{
    return ($object && $object->name) ? $object->name : '--';
}

