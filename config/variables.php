<?php

return [

    'boolean' => [
        '0' => 'No',
        '1' => 'Yes',
    ],

    'role' => [
        '0' => 'User',
        '1' => 'Manager',
        '4' => 'Admin',
        '5' => 'Superadmin',
    ],

    'status' => [
        '1' => 'Active',
        '0' => 'Inactive',
    ],

    'tipoDocumento' => [
        '' => 'Seleccione Tipo de Documento',
        'CC' => 'CC',
        'Nit' => 'Nit',
    ],

     'tipo' => [
        '' => '',
        'Automóvil' => 'Automóvil',
        'Campero' => 'Campero',
        'Camioneta' => 'Camioneta',
        'Bus' => 'Bus',
        'Camión' => 'Camión',
        'Volqueta' => 'Volqueta',
    ],
    
     'sexo' => [
        '' => 'Seleccione Sexo',
        'Masculino' => 'Masculino',
        'Femenino' => 'Femenino',
    ],

    'avatar' => [
        'public' => '/files/avatar/',
        'folder' => public_path() . '/files/avatar/',

        'image' => [
            'width'  => 160,
            'height' => 160,
        ]
    ],

     'porcentaje' => [
        '' => 'Porcentaje de Ganancia Empleado ',
        '0' => '0',
        '45' => '45 %',
        '50' => '50 %',
        '55' => '55 %',
        '60' => '60 %',
    ],


    /*
    |------------------------------------------------------------------------------------
    | ENV of APP
    |------------------------------------------------------------------------------------
    */
    'APP_ADMIN' => env('APP_ADMIN', 'admin'),
    'APP_TOKEN' => env('APP_TOKEN', 'admin123456'),
];
