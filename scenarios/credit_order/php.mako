%if mode == 'definition':
Balanced\Order->creditTo()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-aUV295IugdhWSNx2JFckYBCSvfY2ibgq";

$order = Balanced\Order::get("/orders/OR5QcYnwysJXQswImokq6ZSx");
$bank_account = Balanced\$bank_account::get("/bank_accounts/BA5KLH6jhFgtVENHXOcF3Cfj/credits");
$order->creditTo(
    $bank_account,
    "5000"
);


?>
%endif