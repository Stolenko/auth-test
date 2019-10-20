<?php

use yii\queue\amqp_interop\Queue;
use yii\queue\LogBehavior;

return [
    'class' => Queue::class,
    'host' => $_ENV['RABBITMQ_HOST'],
    'port' => $_ENV['RABBITMQ_PORT'],
    'user' => $_ENV['RABBITMQ_DEFAULT_USER'],
    'password' => $_ENV['RABBITMQ_DEFAULT_PASS'],
    'queueName' => 'queue',
    'driver' => Queue::ENQUEUE_AMQP_LIB,
    'as log' => LogBehavior::class,
];