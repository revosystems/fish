<?php

return [
    'title'             => 'REVO Overview',
    'subtitle'          => 'Sales Platform',
    'slogan'            => 'Sintonizando el canal',
    'channel'           => 'Doing channel',
    'error404_hint'     => 'Lo sentimos, la página a la que intenta acceder no se ha encontrado',


    'pageTitles' => [
        'login'             => 'Acceder al canal',
        'error404'          => 'Página no encontrada',
        'createLead'        => 'Nuevo Lead',
        'proposalLead'      => 'Propuesta para',
        'proposalLeadSlim'  => 'Propuesta',

    ],

    'home' => [
        'newLeadButton'     => 'Nuevo Lead'
    ],

    'lead' => [
        'formHint'              => 'Es importante que recabes esta información clave sobre el lead para preparar bien la fase pre-venta en la que te encuentras. Una vez lo hagas mediante este formulario, obtendrás la orientación sobre todos aquellos ítems que pueden aportar valor a tu potencial cliente, y tendrás una foto bastante real de la envergadura y tipología de la operación ante la que te encuentras.',
        'clientTitle'           => 'Cliente',
        'informationTitle'      => 'Información general',
        'propertyTitle'         => 'Local',
        'configurationTitle'    => 'Configuración',

        // CLIENT
        'type'                  => 'Perfil',
        'type_segment'          => 'Segmentación',
        'generalTypology'       => 'Tipología general',
        'xefSpecificTypology'   => 'Tipología específica',

        // CLIENT INFO
        'trade_name'    => 'Nombre comercial',
        'name'          => 'Nombre',
        'surname1'      => 'Primer apellido',
        'surname2'      => 'Segundo apellido',
        'email'         => 'Correo electrónico',
        'phone'         => 'Teléfono',
        'city'          => 'Población',

        // PROPERTY
        'propertyQuantity'         => '¿Cuantos locales tiene el propietario?',
        'propertySpaces'           => 'Espacios',
        // > XEF
        'xefPropertyFranchise'     => '¿Es franquicia?',
        'xefPropertyCapacity'      => 'Aforo local para carta, no eventos',
        // > RETAIL
        'retailPropertyStaffQuantity'   => 'Nº de empleados / comerciales',

        // CONFIGURATION
        // > XEF & RETAIL
        'devices'                   => '¿Dispone de dispositivos?',
        'devicesHint'               => 'Recomendamos la adquisición de hardware nuevo, pero en caso necesitar usar el actual, debe especificarse todo el material (modelo y año) para la correcta identificación y evaluación por parte de REVO.',
        'devicesHintPlaceholder'    => 'Especificar dispositivos',
        // > XEF
        'xefPosCriticalQuantity'    => 'Nº de comanderos entorno crítico',
        'xefCashQuantity'           => 'Nº de cajas de cobro',
        'xefPrintersQuantity'       => 'Nº de impresoras en cocina',
        'xefKds'                    => '¿Desea trabajar con pantallas en cocina?',
        'xefKdsQuantity'            => 'Nº de pantallas',
        // > XEF & RETAIL
        'pos'                       => 'TPV actual',
        // > RETAIL
        'retailSaleMode'          => '¿Requiere una venta delante del cliente final?',
        'retailSaleLocation'      => '¿Dónde se vende?',
        // > XEF (isFranchise) & RETAIL (isFranchise)
        'franchisePosExternal'      => '¿Tiene autorización para trabajar con otro TPV?',
        // > XEF (isHotel)
        'xefPms'                    => 'PMS actual',
        // > XEF & RETAIL
        'erp'                       => 'ERP actual',
        // > XEF (Medium-Large)
        //                'xefErp'                    => 'ERP actual',
        'xefSoft'                   => 'Software del que dispone el cliente',
        'xefSoftStock'              => 'Almacén y compras',
        'xefSoftStaff'              => 'Gestión de personal',
        'xefSoftBookings'           => 'Reservas',
        'xefSoftDelivery'           => 'Delivery',
        'xefSoftRecipes'            => 'Recetas',
        // > RETAIL (Franchise)
        //                'retailErp'                    => 'ERP actual',
        'retailSoft'                   => 'Otros software del cliente',
        'retailSoftStaff'              => 'Gestión de personal',
        'retailSoftDelivery'           => 'Delivery',

        // OTHERS
        'other'                     => 'Otro',
        'none'                      => 'Ninguno',
        'specify'                   => 'Especificar otro',

        // BUTTONS
        'saveLead'                  => 'Registrar Lead',
        'yes'                       => 'Sí',
        'no'                        => 'No',
        'noOwnLocal'                => 'No, local propio',
        'onLocal'                   => 'En un local',
        'onMobility'                => 'En mobilidad',
        'carta'                     => 'Carta',
        'events'                    => 'Events',
        'menu'                      => 'Menu',
    ],

    'pages' => [
        'home'          => 'Inicio',
        'revo'          => 'Revo',
        'contact'       => 'Contacto',
        'resources'     => 'Recursos',
        'support'       => 'Soporte',
        'lead'          => '+Lead',
        'crm'           => 'CRM',
    ],

    'errors' => [
       'leadException' => 'Se ha producido un error al crear el Lead.'
    ],

    'proposal' => [
        'nav_software'   => 'Software',
        'nav_hardware'   => 'Hardware y accesorios',
        'nav_services'   => 'Servicios',
        'nav_proposals'  => 'Propuestas',
        'download'       => 'Descargar propuesta',
        'download_hint'  => 'Puede tardar unos segundos en generar el archivo PDF',
    ],

    'hardware' => [
        'type_warehouse'    => 'Almacén',
        'type_balances'     => 'Balanzas y lectores',
        'type_cash'         => 'Caja',

        'type_cash_display' => 'Caja & Display cliente',
        'type_cash_mobile'  => 'Caja móvil / autoventa',
        'type_pos'          => 'Comandero',
        'type_kds'          => 'KDS cocina',
        'type_kiosk'        => 'KIOSK "Pre-Order, In-Room & In-Table"',
        'type_payment'      => 'Payment',
        'type_printers'     => 'Printers',
        'type_wifi'         => 'Wifi',

        'hard_title'                => 'Recomendamos los siguientes elementos hardware y accesorios, siempre a concretar en función del proyecto.',
        'ipad_large'                => 'iPad 9.7" o iPad Pro',
        'ipad_large_img'            => 'images/proposals/hard_ipad.png',
        'ipad_large_type_cash'      => 'iPad para la gestión del TPV de caja, el tamaño varía en función de las necesidades operativas del local, siendo el de 9.7" el más utilizado.',
        'ipad_large_type_kds'       => 'iPad para la gestión de las comandas de partida y para el pase en cocina. El tamaño más usado en partida es el de 9.7" y para el pase el iPad Pro.',
        'ipad_large_type_kiosk'     => 'iPad para la gestión de pedidos en modo quiosco. El modelo más usado para Pre-Order es el iPad Pro y para In-Room & In-Table el iPad de 9.7".',
        'ipad_large_type_display'   => 'iPad para la gestión del TPV de caja y para Revo DISPLAY. El tamaño varía en función de las necesidades operativas del local, siendo el de 9.7" el más utilizado.',
        'ipad_stand'                => 'Stand for iPad',
        'ipad_stand_img'            => 'images/proposals/hard_ipad_stand.png',
        'ipad_stand_type_cash'      => 'Soportes para proteger y anclar los dispositivos de forma correcta. El nuestro propio es de gran calidad, construido en acero. Disponible en todos los tamaños.',
        'ipad_stand_type_display'   => 'Soportes para proteger y anclar los dispositivos de forma correcta. El nuestro propio es de gran calidad, construido en acero. Disponible en todos los tamaños.',
        'ipad_iphone'               => 'iPad Mini o iPhone 6S',
        'ipad_iphone_img'           => 'images/proposals/hard_mini.png',
        'ipad_iphone_type_pos'      => 'Dispositivos para tomar nota en mesas, el tamaño varía en función de las necesidades operativas del local, siendo el iPad Mini el más utilizado.',
        'ipad_cover'                => 'Funda para Comanderos',
        'ipad_cmobile_cover'        => 'Funda para caja móvil / autoventa',
        'ipad_cover_img'            => 'images/proposals/hard_funda.png',
        'ipad_cover_cmobile_img'    => 'images/proposals/hard_funda.png',
        'ipad_cover_type_pos'       => 'Fundas rugerizadas con asa, para proteger y tomar nota con los dispositivos de forma cómoda, siendo la Airstrap 360 la opción más recomendable, disponible en todos los tamaños.',
        'ipad_cover_type_cmobile'   => 'Fundas rugerizadas con asa, para proteger y realizar pedidos con los dispositivos de forma cómoda, siendo la Airstrap 360 la opción más recomendable, disponible en todos los tamaños.',
        'kds_stand'                 => 'Soportes para KDS',
        'kds_stand_img'             => 'images/proposals/hard_kds.png',
        'kds_stand_type_kds'        => 'Soportes específicos para proteger los iPads en cocina. Disponemos de soluciones basadas en brazo extensible para mesa, pared o fijo, en todos los tamaños.',
        'kiosk_stand'               => 'Soportes para KIOSK',
        'kiosk_stand_img'           => 'images/proposals/hard_kiosk.png',
        'kiosk_stand_type_kiosk'    => 'En Pre-Order & In-Table, recomendamos el uso de soportes con llave para proteger los iPads de posibles hurtos. En caso de In-Room la recomendación va en función del target de cliente y del tipo de hotel.',
        'itos'                      => 'ITOS BP-50CL',
        'itos_img'                  => 'images/proposals/hard_itos.png',
        'itos_type_payment'         => 'Datáfonos iTOS para la gestión del cobro con tarjeta. El más utilizado es el BP-50CL, y generalmente lo suministra la entidad bancaria del cliente. ',
        'infinity'                  => 'Glory CASHINFINITY',
        'infinity_img'              => 'images/proposals/hard_infinity.png',
        'infinity_type_payment'     => 'En función del proyecto, recomendamos para el cobro el uso de gestores inteligentes de efectivo. Los más fiables son el CI5 y el CI10 del fabricante japonés Glory. ',
        'star'                      => 'Star Micronics',
        'star_img'                  => 'images/proposals/hard_star.png',
        'star_type_printers'        => 'Impresoras Star para la impresión de comandas y tickets. Existen diferentes conectividades según las necesidades (WiFi, ethernet o bluetooth).',
        'dibal'                     => 'Dibal',
        'dibal_img'                 => 'images/proposals/hard_dibal.png',
        'dibal_type_balances'       => 'Balanzas para la gestión del cobro en productos a peso. Existen diversidad de opciones en el mercado, recomendamos la Dibal Chechout por su diseño. ',
        'ubiquiti'                  => 'Ubiquiti Networks',
        'ubiquiti_img'              => 'images/proposals/hard_wifi.png',
        'ubiquiti_type_wifi'        => 'Equipos Ubiquiti Unifi para la gestión de redes y WiFi en locales. Existen diferentes elementos según las necesidades (firewall, switching, acces points… etc.).',
        'motorola'                  => 'Socket Mobile & Motorola',
        'motorola_img'              => 'images/proposals/hard_motorola.png',
        'motorola_type_balances'    => 'Lectores de código de barras para un rápido flujo de cobro. En movilidad el Socket Mobile y en caja central el de Motorola, ambos de lo mejor del mercado.',
        'ipad_ipmini'               => 'iPad o iPad Mini',
        'ipad_ipmini_img'           => 'images/proposals/hard_ipmini.png',
        'ipad_ipmini_type_cmobile'  => 'iPad o iPad Mini para realizar ventas atendidas "on the go" o en autoventa. El tamaño varía en función de las necesidades, siendo el iPad 9.7" el más utilizado.',
        'ipad_ipmini_type_ware'     => 'iPad o iPad Mini para Revo STOCK en almacén. El tamaño varía en función de las necesidades, siendo el iPad 9.7" el más utilizado.',
    ],

    'services' => [
        'title'         => '¿Qué podemos hacer por ti?',
        'setup'         => 'SET-UP',
        'maintenance'   => 'MANTENIMIENTO',

        'install'               => 'Instalación',
        'install_txt'           => 'Configuración de dispositivos, wifi, impresoras, apps, etc.',
        'install_img'           => 'images/proposals/serv_install.png',

        'training'              => 'Formación on-site y en remoto',
        'training_txt'          => 'Formación a Administradores (back-office) y a Empleados (app), introducción conjunta del catálogo de productos...',
        'training_img'          => 'images/proposals/serv_training.png',

        'onboarding'            => 'Onboarding',
        'onboarding_txt'        => 'Acompañamiento en el primer servicio y seguimiento de la implementación.',
        'onboarding_img'        => 'images/proposals/serv_onboarding.png',

        'support'               => 'Soporte',
        'support_img'           => 'images/proposals/serv_support.png',

        'support_service'       => 'Servicio 24/7',
        'support_service_img'   => 'images/proposals/serv_service.png',
        'support_phone'         => 'Tel. de Atención   <a href="tel:+34900104668">+34 900 104 668.</a>',
        'support_phone_img'     => 'images/proposals/serv_phone.png',
        'support_mail'          => 'Mail de Atención <a href="mailto:support@revo.works">support@revo.works. </a>',
        'support_mail_img'      => 'images/proposals/serv_mail.png',
        'support_web'           => 'Web de soporte con, tutoriales y recursos de ayuda.',
        'support_web_img'       => 'images/proposals/serv_web.png',
        'support_info'          => '“Tours Virtuales” en las apps y guías “Primeros pasos”.',
        'support_info_img'      => 'images/proposals/serv_info.png',
        'support_ticket'        => 'Creación de tickets de soporte a través de la app”.',
        'support_ticket_img'    => 'images/proposals/serv_ticket.png',
        'support_idea'          => '“Banco de Ideas” para la mejora continua del software.',
        'support_idea_img'      => 'images/proposals/serv_idea.png',

        'hosting'               => 'Hosting',
        'hosting_txt'           => 'Servicio de hospedaje seguro y fiable en la nube y 1 back-ups al día.',
        'hosting_img'           => 'images/proposals/serv_hosting.png',

        'updates'               => 'Updates',
        'updates_txt'           => 'Acceso a actualizaciones y mejoras de las aplicaciones.',
        'updates_img'           => 'images/proposals/serv_update.png',
    ],


    'contact' => [
        'title'         => '¿Tienes dudas? ¡Contáctanos!',
        'commercial'    => 'Asesoramiento Técnico / Comercial',
        'support'       => 'Soporte',
        'marketing'     => 'Marketing',
    ],

    'resources' => [
        'highlights'                    => 'Highlights',
        'highlights_txt'                => 'Factor diferencial',
        'highlights_dw'                 => '/download/highlights/REVO_Highlights.pdf',

        'references'                    => 'Referencias',
        'references_txt'                => 'Bienvenidos a la revolución',
        'references_dw'                 => '/download/references/REVO_references.pdf',

        'catalogs'                      => 'Catálogos',
        'catalogs_txt'                  => 'Sácale el máximo rendimiento a tu Lead.',

        'catalogs_xef'                  => 'Revo XEF',
        'catalogs_xef_txt'              => 'Gestión de venta y la organización de cualquier negocio de restauración',
        'catalogs_xef_dw'               => '/download/catalogues/ES_catalogo_Revo_XEF.pdf',

        'catalogs_retail'               => 'Revo RETAIL',
        'catalogs_retail_txt'           => 'Gestión de venta y la organización de cualquier negocio retail',
        'catalogs_retail_dw'            => '/download/catalogues/ES_catalogo_Revo_RETAIL.pdf',

        'catalogs_flow'                 => 'Revo FLOW',
        'catalogs_flow_txt'             => 'Gestión inteligente de reservas de cualquier negocio',
        'catalogs_flow_dw'              => '/download/catalogues/ES_catalogo_Revo_FLOW.pdf',

        'catalogs_intouch'              => 'Revo InTouch',
        'catalogs_intouch_txt'          => 'App de fidelización de clientes para negocios de restauración y comercios',
        'catalogs_intouch_dw'           => '/download/catalogues/ES_leaflet_Revo_InTOUCH.pdf',

        'catalogs_hotels'               => 'REVO for hotels ',
        'catalogs_hotels_txt'           => 'Gestión de venta y la organización de todo tipo de alojamientos',
        'catalogs_hotels_dw'            => '/download/catalogues/ES_Revo_for_Hotels.pdf',

        'dossiers'                      => 'Dossiers',
        'dossiers_txt'                  => 'REVO desarrolla apps cloud de gestión y venta (sistema operativo iOS), con las que ofrece una solución integral para el management global de cualquier negocio HoReCa o comercio Retail.',

        'dossiers_xef'                  => 'Revo XEF',
        'dossiers_xef_txt'              => 'App para la gestión integral y de ventas de negocios HORECA',
        'dossiers_xef_dw_orange'        => '/downloadDossier/Orange_Revo_XEF_Dossier_Producto.pdf',
        'dossiers_xef_dw_telefonica'    => '/downloadDossier/Telefonica_Revo_XEF_Dossier_Producto.pdf',

        'dossiers_retail'               => 'Revo RETAIL',
        'dossiers_retail_txt'           => 'App para la gestión integral y de ventas de comercios retail',
        'dossiers_retail_dw_orange'     => '/downloadDossier/Orange_Revo_RETAIL_Dossier_Producto.pdf',
        'dossiers_retail_dw_telefonica' => '/downloadDossier/Telefonica_Revo_RETAIL_Dossier_Producto.pdf',

        'dossiers_flow'                 => 'Revo FLOW',
        'dossiers_flow_txt'             => 'App para la gestión online inteligente de reservas',
        'dossiers_flow_dw_orange'       => '/downloadDossier/Orange_Revo_FLOW_Dossier_Producto.pdf',
        'dossiers_flow_dw_telefonica'   => '/downloadDossier/Telefonica_Revo_FLOW_Dossier_Producto.pdf',

        'dossiers_intouch'              => 'Revo InTouch',
        'dossiers_intouch_txt'          => 'App de fidelización de clientes',
        'dossiers_intouch_dw_orange'    => '/downloadDossier/Orange_Revo_InTOUCH_Dossier_Producto.pdf',
        'dossiers_intouch_dw_telefonica'=> '/downloadDossier/Telefonica_Revo_InTOUCH_Dossier_Producto.pdf',

        'testimonials_title_xef'        => 'Testimonios Revo XEF',
        'testimonials_title_retail'     => 'Testimonios Revo RETAIL',

        'testimonials_llevant_img'          => '/images/resources/video-llevant.jpg',
        'testimonials_llevant_video'        => 'https://www.youtube.com/watch?v=j8F3xkJQra8',

        'testimonials_despiece_img'     => '/images/resources/video-despiece.jpg',
        'testimonials_despiece_video'   => 'https://www.youtube.com/watch?v=2SaoV5yGXPc',

        'testimonials_cardamomo_img'    => '/images/resources/video-cardamomo.jpg',
        'testimonials_cardamomo_video'  => 'https://www.youtube.com/watch?v=0VCDQSPwgnU',

        'testimonials_bereber_img'      => '/images/resources/video-bereber.jpg',
        'testimonials_bereber_video'    => 'https://www.youtube.com/watch?v=GXhD5eH2cAI',

        'testimonials_circulo_img'      => '/images/resources/video-circulo.jpg',
        'testimonials_circulo_video'    => 'https://www.youtube.com/watch?v=hKX4Us_EBjU',

        'testimonials_padel_img'        => '/images/resources/video-padel.jpg',
        'testimonials_padel_video'      => 'https://www.youtube.com/watch?v=XTlLGPTXKps',

        'testimonials_stk_img'          => '/images/resources/video-stk.jpg',
        'testimonials_stk_video'        => 'https://www.youtube.com/watch?v=GPzgi79W0yg',

        'testimonials_milokka_img'      => '/images/resources/video-milokka.jpg',
        'testimonials_milokka_video'    => 'https://www.youtube.com/watch?v=QogUsrf_8G0',

        'testimonials_future_img'      => '/images/resources/video-future.jpg',
        'testimonials_future_video'    => 'https://www.youtube.com/watch?v=rayW2jkgBhs',
    ]
];
