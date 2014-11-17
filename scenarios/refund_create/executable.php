<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$debit = Balanced\Debit::get("/debits/WD4heQm0HfB6IpymdvsGM8dv");

$debit->refunds->create(array(
    'description' => 'Refund for Order #1111',
    'meta' => array(
            "fulfillment.item.condition" => "OK",
            "merchant.feedback" => "positive",
            "user.refund_reason" => "not happy with product",
        )
));


?>