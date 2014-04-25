<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$debit = Balanced\Debit::get("/debits/WD4vEUJj36IpPHTnLKMYzHgh");
$debit->description = "New description for debit";
$debit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$debit->save();

?>