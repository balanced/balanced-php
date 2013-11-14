<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$customer = \Balanced\Customer::get("/v1/customers/CU6n0viWQoT86ttbkCsPgV0Y");
$customer->addBankAccount("/v1/bank_accounts/BA6oxYWJXxeM63vMorgtSIhI");

?>