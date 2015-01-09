<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$bank_account = Balanced\BankAccout::get("/bank_accounts/BA45anEaEr8g0lOhzhcE9VAN");
$bank_account->credits->query()->all();

?>