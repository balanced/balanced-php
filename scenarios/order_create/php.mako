%if mode == 'definition':
Balanced\Customer->orders->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$merchant = Balanced\Customer::get("/customers/CU33BRpISgIfG6on2EQ1967P");
$order = $merchant->orders->create();

?>
%endif