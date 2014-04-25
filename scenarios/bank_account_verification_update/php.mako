%if mode == 'definition':
Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$verification = Balanced\BankAccountVerification::get("/verifications/BZ3KkIZuSazKfqFrFIfsrhmB");
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();

?>
%endif