<?php

require 'vendor/autoload.php';

use PhpMqtt\Client\MqttClient;

$server = 'localhost';
$port = 1883;
$clientId = 'user1';

try {
    $mqtt = new MqttClient($server, $port, $clientId);
    $mqtt->connect();

    $data = [
        'id' => 1,
        'value' => 1
    ];

    $mqtt->publish('test-topic', json_encode($data), 0);

    $mqtt->disconnect();
} catch (Exception $e) {
    echo $e->getMessage();
}