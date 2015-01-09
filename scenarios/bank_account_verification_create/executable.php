<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3LVXVgJLrzkmB3vUntKJ6t");
$verification = $bank_account->verify();

?>