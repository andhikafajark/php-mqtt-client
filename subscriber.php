<?php

require 'vendor/autoload.php';

use PhpMqtt\Client\MqttClient;

$server = 'localhost';
$port = 1883;
$clientId = 'user2';

try {
    $mqtt = new MqttClient($server, $port, $clientId);
    $mqtt->connect();

    $mqtt->subscribe('test-topic', function ($topic, $message) {
        echo "Received message on topic [$topic]: $message\n";
    }, 0);

    $mqtt->loop(true);

    $mqtt->disconnect();
} catch (Exception $e) {
    echo $e->getMessage();
}