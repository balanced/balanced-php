<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA4GVxlUHmn8y0CjAUEcW6Kp");
$bank_account->unstore();

?>