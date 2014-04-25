<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$credit = Balanced\Credit::get("/credits/CR4yt4sdkTWI1t3HVS16mNAV");
$credit->description = 'New description for credit';
$credit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$credit->save();

?>