%if mode == 'definition':
\Balanced\Marketplace::mine()->bank_accounts->create()


% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$marketplace = \Balanced\Marketplace::mine();
$bank_account = $marketplace->bank_accounts->create(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
));

$bank_account->save();

?>
%endif