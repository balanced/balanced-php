<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP64bmAzypIUS0SUZ4qkoFqG/debits/WD7pYB2uXq8QAZvVrvO1l2Oq");
$debit->refund(
    null,
    "Refund for Order #1111",
    array(
            "fulfillment.item.condition" => "OK",
            "merchant.feedback" => "positive",
            "user.refund_reason" => "not happy with product",
        )
);