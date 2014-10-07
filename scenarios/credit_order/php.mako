%if mode == 'definition':
Balanced\Order->creditTo()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$order = Balanced\Order::get("/orders/OR3U6xrLShgIQBwQXNXkpF4c");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3iL1FdIp8TtqE1wGrB52hi/credits");
$order->creditTo(
    $bank_account,
    "5000"
);


?>
%endif