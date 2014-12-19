<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$order = Balanced\Order::get("/orders/OR2JfBYxYlDAF3L48u9DtIEU");
$card = Balanced\Card::get("/cards/CC4fWSr1PpCAh6mlDzNfr0Gs");
$order->creditTo(
    $card,
    "5000"
);

?>