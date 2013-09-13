<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$buyer = Balanced\Marketplace::mine()->createBuyer(
    null,
    "/v1/marketplaces/TEST-MP20QSIx33BcCbLmSfH5uFTA/cards/CC28WSDPvnnAENtyrVwQXTCT"
);

?>