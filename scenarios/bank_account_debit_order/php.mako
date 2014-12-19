%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$order = Balanced\Order::get("/orders/OR2JfBYxYlDAF3L48u9DtIEU");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA305R4Vwumo1KjT9kwVrdfT");
$order->debitFrom(
    $bank_account,
    "5000"
);

?>
%endif