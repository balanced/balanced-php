<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$card = Balanced\Card::get("/cards/CC3bspNmYxyJu9J52MbgArDy");
$card->associateToCustomer("/customers/CU4CZc7Xjn8gGJXl1LyzZk7S");

?>