<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA24zuAEQUhpAnOpRQIssXuR");
$bank_account->credits->create(array(
    "amount" => "5000",
));

?>