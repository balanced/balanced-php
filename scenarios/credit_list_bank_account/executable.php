<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$bank_account = Balanced\BankAccout::get("/bank_accounts/BA3PDwDCkdeC4OgPtPNwoCWl");
$bank_account->credits->query()->all();

?>