<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3Y63fK5STwlhKNMkE3Utmd");
$bank_account->credits->create(array(
    "amount" => "5000",
));

?>