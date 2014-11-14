<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA17zYxBNrmg9isvicjz9Ae4");
$verification = $bank_account->verify();

?>