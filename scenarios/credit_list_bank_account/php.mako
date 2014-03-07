%if mode == 'definition':
Balanced\BankAccount->credits->query()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$bank_account = Balanced\BankAccout::get("/bank_accounts/BA2M6q0hqFsbnpPbPb7xeQo6");
$bank_account->credits->query()->all();

?>
%endif