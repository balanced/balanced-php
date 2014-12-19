%if mode == 'definition':
Balanced\Customer->orders->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$merchant = Balanced\Customer::get("/customers/CU4CZc7Xjn8gGJXl1LyzZk7S");
$order = $merchant->orders->create();

?>
%endif