<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/accounts/CU5U8N8xXdkTgLmmV3wSozLc");
$account->addBankAccount("/v1/bank_accounts/BA61ypiv3pJICo3jQJxGTTUO");

?>