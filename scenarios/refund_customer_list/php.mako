%if mode == 'definition':
Balanced\Balanced->refunds()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$customer = Balanced\Customer::get("/v1/customers/CU7gMTGKh2yGHYn1lUxH9STS");
$refunds = $customer->refunds->query()->all();

?>
%endif