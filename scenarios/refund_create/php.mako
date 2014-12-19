%if mode == 'definition':
Balanced\Debit->refunds->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$debit = Balanced\Debit::get("/debits/WD4LT3ghEgoGK9z4wUQCsKUU");

$debit->refunds->create(array(
    'description' => 'Refund for Order #1111',
    'meta' => array(
            "fulfillment.item.condition" => "OK",
            "merchant.feedback" => "positive",
            "user.refund_reason" => "not happy with product",
        )
));


?>
%endif