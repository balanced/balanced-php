%if mode == 'definition':
Balanced\Order->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$order = Balanced\Order::get("/orders/OR3Ol0FhtkLKUwZvw3D2frmO");
$order->description = 'New description for order';
$order->meta = array(
    "anykey" => "valuegoeshere",
    "product.id" => "1234567890",
);
$order->save();

?>
%endif