<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA2u6eI5wwn9pGSccrUJ7mIn/verifications/BZ2vPOcd0t2RJ4IdMBb2cPgz");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>