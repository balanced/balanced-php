%if mode == 'definition':
\Balanced\BankAccountVerification->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA4plzFRTGgaoZftGcIJH3Py");
$verification = $bank_account->verify();

?>
%endif