<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$order = Balanced\Order::get("/orders/OR1MqLeXKqwqqW254i3GJ72F");
$order->description = 'New description for order';
$order->meta = array(
    "anykey" => "valuegoeshere",
    "product.id" => "1234567890",
);
$order->save();

?>