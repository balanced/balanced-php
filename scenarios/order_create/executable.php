<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$merchant = Balanced\Customer::get("/customers/CU499nloIJTytIag1r7VFBCg");
$order = $merchant->orders->create();

?>