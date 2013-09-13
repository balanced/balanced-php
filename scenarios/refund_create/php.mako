%if mode == 'definition':
Balanced\Debit->refund()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP20QSIx33BcCbLmSfH5uFTA/debits/WD4a752qZN1TB6UAUjP7B9P2");
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
%endif