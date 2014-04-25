<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$card = Balanced\Card::get("/cards/CC4tvKLTKXcBJAgkGvPEW58N");
$card->associateToCustomer("/customers/CU3VYCUIfwngJsidJWdGw2W5");

?>