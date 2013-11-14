<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP4K6K0PWGyPtXL4LZ42sQSb/debits/WD7omMnm45N2JcPZ6fcaRRgY");
$debit->refund(
    null,
    "Refund for Order #1111",
    array(
            "fulfillment.item.condition" => "OK",
            "merchant.feedback" => "positive",
            "user.refund_reason" => "not happy with product",
        )
);

?>