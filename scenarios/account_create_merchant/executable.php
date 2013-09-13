<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$account = \Balanced\Account::get("/v1/marketplaces/TEST-MP20QSIx33BcCbLmSfH5uFTA/accounts/AC29qhoujo2WdBgmYZ5rAi1A");
$account->addBankAccount("/v1/bank_accounts/BA2ebRVuc5vzD5CrF6Gorau6");

?>