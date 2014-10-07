<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$bank_account = Balanced\BankAccout::get("/bank_accounts/BA3aTW6KDCzyhsAE88XGhXHT");
$bank_account->credits->query()->all();

?>