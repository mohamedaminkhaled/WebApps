<?php

return [

    'driver' => 'smtp',

    'host' =>'smtp.mailtrap.io',

    'port' => 2525,

    'from' => [
        'address' => 'hello@example.com',
        'name' =>  'Example',
    ],

    'encryption' => 'tls',

    'username' => '3f025dc926919a',

    'password' => 'ca9b40775a1bcb',

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
