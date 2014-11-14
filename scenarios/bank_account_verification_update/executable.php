<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$verification = Balanced\BankAccountVerification::get("/verifications/BZ1PKTrA4k1yujxqam8oqxY9");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>