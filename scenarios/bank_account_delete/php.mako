%if mode == 'definition':
Balanced\BankAccount->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3Ya2sAlEQE14O1iS17FN0Q");
$bank_account->unstore();

?>
%endif