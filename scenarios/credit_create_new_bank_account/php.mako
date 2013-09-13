%if mode == 'definition':
Balanced\Credit::bankAccount()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$bank_account_info = array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
);
$credit = Balanced\Credit::bankAccount(
    10000,
    $bank_account_info
);

?>
%endif