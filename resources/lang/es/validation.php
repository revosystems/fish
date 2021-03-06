<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_equals'          => ':attribute debe ser una fecha igual a :date.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'gt'                   => [
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'file'    => 'El campo :attribute debe tener más de :value kilobytes.',
        'string'  => 'El campo :attribute debe tener más de :value caracteres.',
        'array'   => 'El campo :attribute debe tener más de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => 'El campo :attribute debe ser como mínimo :value.',
        'file'    => 'El campo :attribute debe tener como mínimo :value kilobytes.',
        'string'  => 'El campo :attribute debe tener como mínimo :value caracteres.',
        'array'   => 'El campo :attribute debe tener como mínimo :value elementos.',
    ],
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser un dirección IPv4 válida',
    'ipv6'                 => ':attribute debe ser un dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'lt'                   => [
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'file'    => 'El campo :attribute debe tener menos de :value kilobytes.',
        'string'  => 'El campo :attribute debe tener menos de :value caracteres.',
        'array'   => 'El campo :attribute debe tener menos de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => 'El campo :attribute debe ser como máximo :value.',
        'file'    => 'El campo :attribute debe tener como máximo :value kilobytes.',
        'string'  => 'El campo :attribute debe tener como máximo :value caracteres.',
        'array'   => 'El campo :attribute debe tener como máximo :value elementos.',
    ],
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'            => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'not_regex'            => 'El formato del campo :attribute no es válido.',
    'numeric'              => ':attribute debe ser numérico.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => 'El campo :attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => 'El formato :attribute es inválido.',
    'uuid'                 => 'El campo :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'password' => [
	        'required'  => 'Campo obligatorio',
            'min' => 'La :attribute debe contener más de :min caracteres',
        ],
	    'company' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'enterprise' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'department' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'position' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'name' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'firstsurname' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'secondsurname' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
        'surname1' => [
            'required'  => 'Campo obligatorio',
            'string'    => 'Debe ser una cadena de caracteres',
            'min'       => 'Mínimo :min caracteres',
            'max'       => 'Máximo :max caracteres',
        ],
        'surname2' => [
            'required'  => 'Campo obligatorio',
            'string'    => 'Debe ser una cadena de caracteres',
            'min'       => 'Mínimo :min caracteres',
            'max'       => 'Máximo :max caracteres',
        ],
	    'email' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
		    'email'     => 'No es un correo válido',
		    'unique'    => 'El :attribute ya ha sido registrado.',
		    'digits_between' => 'Debe tener entre :min y :max dígitos'
	    ],
	    'phone' => [
		    'required'  => 'Campo obligatorio',
		    'numeric'   => 'Debe ser numérico',
            'digits_between' => 'Debe tener entre :min y :max dígitos'
	    ],
	    'city' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],
	    'territory' => [
		    'required'  => 'Campo obligatorio',
		    'string'    => 'Debe ser una cadena de caracteres',
		    'min'       => 'Mínimo :min caracteres',
		    'max'       => 'Máximo :max caracteres',
	    ],



        // CLIENT
            'type' => [
                'required'  => 'Debe seleccionar una opción',
            ],
            'type_segment_id' => [
                'required'  => 'Debe seleccionar una opción',
            ],
            'xef_general_typology_id' => [
                'required_if'  => 'Debe seleccionar una opción',
            ],
            'retail_general_typology_id' => [
            'required_if'  => 'Debe seleccionar una opción',
        ],
            // > XEF
            'xef_specific_typology_id' => [
                'required_if'  => 'Debe seleccionar una opción',
            ],

        // CLIENT INFO
            'trade_name' => [
                'required'  => 'Campo obligatorio',
                'min'       => 'Mínimo :min caracteres',
                'max'       => 'Máximo :max caracteres',
            ],

            // PROPERTY
            'retail_property_quantity' => [
                'required_if'  => 'Campo obligatorio',
                'numeric'   => 'Debe ser numérico',
            ],
            'xef_property_quantity' => [
                'required_if'  => 'Campo obligatorio',
                'numeric'   => 'Debe ser numérico',
            ],
            // > XEF
                'xef_property_franchise_id' => [
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'xef_property_spaces' => [
                    'required'  => 'Debe seleccionar una opción',
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'xef_property_capacity' => [
                    'required_if'  => 'Campo obligatorio',
                    'numeric'   => 'Debe ser numérico',
                ],
            // > RETAIL
                'retail_property_spaces' => [
                    'required'  => 'Debe seleccionar una opción',
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'retail_property_staff_quantity' => [
                    'required_if'  => 'Campo obligatorio',
                    'numeric'   => 'Debe ser numérico',
                ],

        // CONFIGURATION
            // > XEF & RETAIL
                'devices' => [
                    'required'  => 'Debe seleccionar una opción',
                ],
                'devices_current' => [
                    'required_if'  => 'Campo obligatorio',
                    'string'    => 'Debe ser una cadena de caracteres',
                    'min'       => 'Mínimo :min caracteres',
                ],
            // > XEF
                'xef_pos_critical_quantity' => [
                    'required_if'  => 'Campo obligatorio',
                    'numeric'   => 'Debe ser numérico',
                ],
                'xef_cash_quantity' => [
                    'required_if'  => 'Campo obligatorio',
                    'numeric'   => 'Debe ser numérico',
                ],
                'xef_printers_quantity' => [
                    'required_if'  => 'Campo obligatorio',
                    'numeric'   => 'Debe ser numérico',
                ],
                'xef_kds_id' => [
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'xef_kds_quantity' => [
                    'required_if'  => 'Campo obligatorio',
                    'numeric'   => 'Debe ser numérico',
                ],
            // > XEF & RETAIL
                'pos_id' => [
                    'required'  => 'Debe seleccionar una opción',
                ],
                'pos_other' => [
                    'required_if'  => 'Campo obligatorio',
                    'string'    => 'Debe ser una cadena de caracteres',
                    'min'       => 'Mínimo :min caracteres',
                    'max'       => 'Máximo :max caracteres',
                ],
            // > RETAIL
                'retail_sale_mode_id' => [
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'retail_sale_location_id' => [
                    'required_if'  => 'Debe seleccionar una opción',
                ],
            // > XEF (isFranchise) & RETAIL (isFranchise)
                'franchise_pos_external' => [
                    'required_if'  => 'Debe seleccionar una opción',
                ],
            // > XEF (isHotel)
                'xef_pms_id' => [
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'xef_pms_other' => [
                    'required_if'  => 'Campo obligatorio',
                    'string'    => 'Debe ser una cadena de caracteres',
                    'min'       => 'Mínimo :min caracteres',
                    'max'       => 'Máximo :max caracteres',
                ],
            // > XEF & RETAIL
                'erp' => [
                    'required'  => 'Debe seleccionar una opción',
                ],
                'erp_other' => [
                    'required_if'  => 'Campo obligatorio',
                    'string'    => 'Debe ser una cadena de caracteres',
                    'min'       => 'Mínimo :min caracteres',
                    'max'       => 'Máximo :max caracteres',
                ],

            // > XEF (Medium-Large)
                'xef_soft' => [
                    'required'  => 'Debe seleccionar una opción',
                    'required_if'  => 'Debe seleccionar una opción',
                ],
                'xef_soft_other' => [
                    'string'    => 'Debe ser una cadena de caracteres',
                    'min'       => 'Mínimo :min caracteres',
                    'max'       => 'Máximo :max caracteres',
                ],
            // > RETAIL (FRANCHISE)
                'retail_soft' => [
                    'required'  => 'Debe seleccionar una opción',
                    'required_if'  => 'Debe seleccionar una opción',

                ],
                'retail_soft_other' => [
                    'string'    => 'Debe ser una cadena de caracteres',
                    'min'       => 'Mínimo :min caracteres',
                    'max'       => 'Máximo :max caracteres',
                ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'correo electrónico',
        'first_name'            => 'nombre',
        'last_name'             => 'apellido',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'country'               => 'país',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'móvil',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'content'               => 'contenido',
        'body'                  => 'contenido',
        'description'           => 'descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',
    ],
];
