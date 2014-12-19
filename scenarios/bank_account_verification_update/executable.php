<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$verification = Balanced\BankAccountVerification::get("/verifications/BZ37ck8caI06gKMmpz70Zt6w");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>