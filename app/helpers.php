<?php

function gravatar($email, $size = 40)
{
    $gravatarURL  = gravatarUrl($email, $size);

    return "<img id = {$email} alt=\"user\" class=\"gravatar user-avatar rounded-circle\" src=\"{$gravatarURL}\" width=\"{$size}\">";
}

function gravatarUrl($email, $size)
{
    $email = md5(strtolower(trim($email)));
    //$gravatarURL = "https://www.gravatar.com/avatar/" . $email."?s=".$size."&d=mm";
    $defaultImage = urlencode('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png');

    return 'https://www.gravatar.com/avatar/'.$email.'?s='.$size."&default={$defaultImage}";
}

function timeZoned($date)
{
    return $date ? $date->timezone(auth()->user()->timezone) : '';
}

function getMonthName($monthNumber)
{
    return __("reports." . date("F", mktime(0, 0, 0, $monthNumber, 1)));
}

function dayOfWeekName($dayOfWeek)
{
    return __("reports." . strtolower(date('l', strtotime("Sunday + {$dayOfWeek} Days"))));
}
