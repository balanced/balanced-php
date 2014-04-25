<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$merchant = Balanced\Customer::get("/customers/CU4MnFEab304anOtUtEu5hkN");
$order = $merchant->orders->create();

?>