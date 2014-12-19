%if mode == 'definition':
Balanced\Order->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$order = Balanced\Order::get("/orders/OR1ugPYIQ94wAaS439i25QVL");
$order->description = 'New description for order';
$order->meta = array(
    "anykey" => "valuegoeshere",
    "product.id" => "1234567890",
);
$order->save();

?>
%endif