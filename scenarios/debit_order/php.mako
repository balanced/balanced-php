%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$order = Balanced\Order::get("/orders/OR483MoeOnJEXwkxqoPdnDF3");
$card = Balanced\Card::get("/cards/CC5zxUdioIB0Dc2rjM1PK3Cw");
$order->debitFrom(
    $card,
    "5000"
);



?>
%endif