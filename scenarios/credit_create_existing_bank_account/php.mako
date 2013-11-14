%if mode == 'definition':
Balanced\BankAccount->credit()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2KZfoLyijij3Y6OyhDAvFRF9tXzelBLpD";

$bank_account = Balanced\BankAccount::get("/v1/bank_accounts/BA5A8YcoSCEPQyCaPCTvmFnW");
$credit = $bank_account->credit(10000);

?>
%endif