<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3uzbngfVXy1SGg25Et7iKY");
$bank_account->associateToCustomer("/customers/CU2DRnwOXfbxBlKb5CUWwWJi");

?>