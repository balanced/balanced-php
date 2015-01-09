%if mode == 'definition':
Balanced\Order->debitFrom()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$order = Balanced\Order::get("/orders/OR5e6wrps4tp9QarDxWa01O5");
$bank_account = Balanced\BankAccount::get("/bank_accounts/BA3uzbngfVXy1SGg25Et7iKY");
$order->debitFrom(
    $bank_account,
    "5000"
);

?>
%endif