<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$bank_account_info = array(
    "account_number" => "9900000000",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
);
$credit = Balanced\Credit::bankAccount(
    10000,
    $bank_account_info
);

?>