%if mode == 'definition':
\Balanced\Customer->debit();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$customer = \Balanced\Customer::get("/v1/customers/CU6vs1tjxBtifgTuzKjCGtVS");
$customer->debit('5000');

?>
%endif