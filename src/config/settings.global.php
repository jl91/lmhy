<?php

return [
    'settings' => [
        'displayErrorDetails' => false,
        'addContentLengthHeader' => false,
        // Monolog settings
        'logger' => [
            'name' => 'lmhy',
            'path' => APP_ROOT . 'logs' . DS . 'app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];