%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$order = Balanced\Order::get("/orders/OR46RV9HyvE8esnGbLPkJKW4");
$card = Balanced\Card::get("/cards/CC2vbVLAMwrNqlLvp3km6hq0");
$order->debitFrom(
    $card,
    "5000"
);



?>
%endif