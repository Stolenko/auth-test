<?php

return [
    'class' => yii\swiftmailer\Mailer::class,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => $_ENV['EMAIL_SERVER'],
        'username' => $_ENV['EMAIL_USER'] ?? null,
        'password' => $_ENV['EMAIL_PASSWORD'] ?? null,
        'port' => $_ENV['EMAIL_PORT'],
        'encryption' => $_ENV['EMAIL_ENCRYPTION'], // It is often used, check your provider or mail server specs
    ],
];