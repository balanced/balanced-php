<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$merchant = Balanced\Customer::get("/customers/CU6sIkS1KUtHVoPUBM1Gf72B");
$order = $merchant->orders->create();

?>