<?php

return [
    'failed'    => 'Estas credenciales no coinciden con nuestros registros.',
    'throttle'  => 'Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.',
    'noactive'  => 'Su cuenta se ha creado correctamente y está a la espera de activación.',

	'fields' =>[
		'email'             => 'Correo electrónico',
		'password'          => 'Contraseña',
		'passwordConfirm'   => 'Confirmar contraseña',
		'remember'          => 'Recordarme',
		'enterprise'        => 'Empresa',
		'territory'         => 'Territorio',
		'name'              => 'Nombre',
		'surname1'          => 'Primer apellido',
		'surname2'          => 'Segundo apellido',
		'department'        => 'Departamento',
		'position'          => 'Posición',
		'phone'             => 'Teléfono',
        'territoryCat'          => 'Cataluña',
        'territoryNorte'        => 'Norte',
        'territoryCentro'       => 'Centro',
        'territorySur'          => 'Sur'
	],

	'login' =>[
		'button'        => 'Acceder',
		'forgotLink'    => "¿Recuperar?",
		'registerLink'  => '¿Aún no tiene una cuenta?',
		'backLink'      => 'Volver al acceso',
	],

	'register' =>[
		'button'                => 'Registrar',
		'loginLink'             => '¿Ya tiene una cuenta?',
		'verifyTitle'           => 'Verifique su correo',
		'verifyHint'            => 'Antes de continuar, por favor revise su correo electrónico para obtener un enlace de verificación.',
		'verifyLinkIntro'       => 'Si no recibió el correo electrónico',
		'verifyLinkClick'       => 'haga clic aquí para solicitar otro',
		'verifyNotification'    => 'Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.',
	],

	'forgot' =>[
		'button'        => 'Restablecer la contraseña',
		'resetTitle'    => 'Restablecer la contraseña'
	],
];