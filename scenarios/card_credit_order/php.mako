%if mode == 'definition':
Balanced\Order->creditTo()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$order = Balanced\Order::get("/orders/OR3vURGwVtqDnnkRS9fgH41G");
$card = Balanced\Card::get("/cards/CC4HDcgvzIltvwv6GSjBVbji");
$order->creditTo(
    $card,
    "5000"
);

?>
%endif