<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$bank_account = Balanced\BankAccount::get("/v1/bank_accounts/BA2yehpCWYZHAMjwcCZHlzMk");

?>