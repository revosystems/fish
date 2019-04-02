<?php
return [
    'register' =>[
        'greeting'      => 'Hola',
        'subject'       => 'Confirme su dirección de correo electrónico',
        'verifyHint'    => 'Haga clic en el botón para verificar su dirección de correo electrónico.',
        'verifyAction'  => 'Confirmar correo electrónico',
        'salutation'    => 'Saludos',
        'ignore'        => 'Si no creó una cuenta, no se requiere ninguna acción adicional.',
    ],

    'reset' =>[
        'greeting'      => 'Hola',
        'subject'       => 'Notificación de restablecimiento de contraseña',
        'resetHint'     => 'Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.',
        'resetAction'   => 'Restablecer la contraseña',
        'expiration'    => 'Este enlace de restablecimiento de contraseña caducará en :count minutos.',
        'salutation'    => 'Saludos',
        'ignore'        => 'Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.',
    ],

    'problems' => 'Si tiene problemas para hacer clic en el botón ":actionText", copie y pegue la siguiente URL en su navegador: [:actionURL](:actionURL)'
];