<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP29J5STPtZVvnjAFndM0N62/debits/WD3lDAXDcPpgK8tHFcdXEO2Y");
$debit->refund(
    null,
    "Refund for Order #1111",
    array(
        )
);