<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-aUV295IugdhWSNx2JFckYBCSvfY2ibgq";

$order = Balanced\Order::get("/orders/OR5QcYnwysJXQswImokq6ZSx");
$card = Balanced\Card::get("/cards/CC5OD6648yiKfSzfj6z6MdXr");
$order->debitFrom(
    $card,
    "5000"
);



?>