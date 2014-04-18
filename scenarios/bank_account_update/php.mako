%if mode == 'definition':
Balanced\BankAccount->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$bank_account = Balanced\BankAccount::get("/bank_accounts/BA8MzVwjVFnkuUvfHaXmqMZ");
$bank_account->meta = array(
    "facebook.user_id" => "0192837465",
    "my-own-customer-id" => "12345",
    "twitter.id" => "1234987650",
);
$bank_account->save();

?>
%endif