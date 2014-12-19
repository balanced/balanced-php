%if mode == 'definition':
Balanced\BankAccount->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA4UZsYXpf2BX97v5WPaT57O");
$bank_account->credits->create(array(
    "amount" => "5000",
));

?>
%endif