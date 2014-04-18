<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$debit = Balanced\Debit::get("/debits/WD19cDwPJMMJj6UWn4YI2bGZ");

$debit->refunds->create(array(
    'description' => 'Refund for Order #1111',
    'meta' => array(
            "fulfillment.item.condition" => "OK",
            "merchant.feedback" => "positive",
            "user.refund_reason" => "not happy with product",
        )
));


?>