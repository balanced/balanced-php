%if mode == 'definition':
Balanced\BankAccount->unstore()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA8MzVwjVFnkuUvfHaXmqMZ");
$bank_account->unstore();

?>
%endif