%if mode == 'definition':
Balanced\Order->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$order = Balanced\Order::get("/orders/OR5sl2RJVnbwEf45nq5eATdz");
$order->description = 'New description for order';
$order->meta = array(
    "anykey" => "valuegoeshere",
    "product.id" => "1234567890",
);
$order->save();

?>
%endif