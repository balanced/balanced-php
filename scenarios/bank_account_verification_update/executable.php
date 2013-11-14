<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA5uvDqG8xk4bGmwX3JTbIee/verifications/BZ5wpXXDTZxqLCHiX6V4XXvA");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>