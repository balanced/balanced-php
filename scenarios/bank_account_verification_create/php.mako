%if mode == 'definition':
\Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA305R4Vwumo1KjT9kwVrdfT");
$verification = $bank_account->verify();

?>
%endif