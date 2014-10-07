<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3iL1FdIp8TtqE1wGrB52hi");
$bank_account->associateToCustomer("/customers/CU3hKsZgnr26YSfwWrGFehna");

?>