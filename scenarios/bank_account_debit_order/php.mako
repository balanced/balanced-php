%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$order = Balanced\Order::get("/orders/OR5sl2RJVnbwEf45nq5eATdz");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA17zYxBNrmg9isvicjz9Ae4");
$order->debitFrom(
    $bank_account,
    "5000"
);

?>
%endif