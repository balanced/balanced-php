%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-YnjW61zGxEdhpzkBcohFZ2bZhjrdtbDW";

$order = Balanced\Order::get("/orders/OR46RV9HyvE8esnGbLPkJKW4");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA1FYgj0UJZfgydhl3X65RKR");
$order->debitFrom(
    $bank_account,
    "5000"
);

?>
%endif