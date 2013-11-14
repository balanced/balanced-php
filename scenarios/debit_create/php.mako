%if mode == 'definition':
Balanced\Buyer->debit()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$customer = Balanced\Customer::get("/v1/customers/CU7gMTGKh2yGHYn1lUxH9STS");
$customer->debit(
    "5000",
    "Statement text",
    null,
    "Some descriptive text for the debit in the dashboard"
);

?>
%endif