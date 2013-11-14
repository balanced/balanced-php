<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$customer = \Balanced\Customer::get("/v1/customers/CU70CIWA2NrZwwMQqjBuWFUb");
$customer->addCard("/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/cards/CC72hXVwWbCJsozvJoRELzIc");

?>