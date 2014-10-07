%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$order = Balanced\Order::get("/orders/OR3U6xrLShgIQBwQXNXkpF4c");
$card = Balanced\Card::get("/cards/CC3KykwD9fCcY10zNx28tJrG");
$order->debitFrom(
    $card,
    "5000"
);



?>
%endif