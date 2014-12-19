%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$order = Balanced\Order::get("/orders/OR2JfBYxYlDAF3L48u9DtIEU");
$card = Balanced\Card::get("/cards/CC48j1De9eVYELLivrgDeCM8");
$order->debitFrom(
    $card,
    "5000"
);



?>
%endif