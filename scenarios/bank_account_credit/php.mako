%if mode == 'definition':
Balanced\BankAccount->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BAscOV2erMwv3yhIb5sFTaV");
$bank_account->credits->create(array(
    "amount" => "5000",
));

?>
%endif