<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

Balanced\BankAccount::get("/bank_accounts/BA3BkV8D5D77J22Ktzx8lyI0")->associateToCustomer("/customers/CU3veCwC1nqk9GV6dfSkRHRS")

?>