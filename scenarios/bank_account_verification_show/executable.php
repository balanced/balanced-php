<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA5nW8SMsXjaU3GVWdhR9d60/verifications/BZ5rcuNvebC49kZyTGAaJu2A");

?>