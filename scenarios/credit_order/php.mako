%if mode == 'definition':
Balanced\Order->creditTo()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$order = Balanced\Order::get("/orders/OR2HOnnSXYW3xIZwUL6tPOKx");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA24zuAEQUhpAnOpRQIssXuR/credits");
$order->creditTo(
    $bank_account,
    "5000"
);


?>
%endif