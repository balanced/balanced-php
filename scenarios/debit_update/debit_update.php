<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$debit = Balanced\Debit::get("/v1/marketplaces/TEST-MP64bmAzypIUS0SUZ4qkoFqG/debits/WD706iriHZn5MZEyQ86DmHmE");
$debit->description = "New description for debit";
$debit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$debit->save();