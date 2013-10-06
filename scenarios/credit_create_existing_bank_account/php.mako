%if mode == 'definition':
Balanced\BankAccount->credit()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$bank_account = Balanced\BankAccount::get("/v1/bank_accounts/BA6wDj2MwJTwkPA4s4rEMq2y");
$credit = $bank_account->credit(10000);

?>
%endif