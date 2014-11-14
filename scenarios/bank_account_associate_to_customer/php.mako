%if mode == 'definition':
Balanced\BankAccout->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA2gul8YMjFWnFk0fFHXwX6g");
$bank_account->associateToCustomer("/customers/CU2718cI8PkMdFyPjboZLZfn");

?>
%endif