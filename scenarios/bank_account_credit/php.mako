%if mode == 'definition':
Balanced\BankAccount->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2eKlj1ZDfAcZSARMf3NMhBHywDej0avSY";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA45anEaEr8g0lOhzhcE9VAN");
$bank_account->credits->create(array(
    "amount" => 5000,
));

?>
%endif