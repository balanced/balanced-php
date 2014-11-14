%if mode == 'definition':
Balanced\BankAccount->credits->query()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$bank_account = Balanced\BankAccout::get("/bank_accounts/BA1V6LoRzyncAUfMieBGiPUQ");
$bank_account->credits->query()->all();

?>
%endif