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
