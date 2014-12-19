<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$customer = Balanced\Customer::get("/customers/CU2DRnwOXfbxBlKb5CUWwWJi");
$accounts = customer->accounts->query()->all();

?>