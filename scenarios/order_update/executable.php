<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$order = Balanced\Order::get("/orders/OR6d55qbtKx5aWSURkQeodRr");
$order->description = 'New description for order';
$order->meta = array(
    "anykey" => "valuegoeshere",
    "product.id" => "1234567890",
);
$order->save();

?>