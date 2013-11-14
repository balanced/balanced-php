%if mode == 'definition':
Balanced\Customer->holds()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$customer = Balanced\Customer::get("/v1/customers/CU6ZO6HM8Hf8NMQRMm3ZlCAe");
$holds = $customer->holds->query()->all();

?>
%endif