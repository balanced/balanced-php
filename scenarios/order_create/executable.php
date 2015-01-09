<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$merchant = Balanced\Customer::get("/customers/CU3MjqyarSxE66kggE8MMtGB");
$order = $merchant->orders->create();

?>