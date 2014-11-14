$order = Balanced\Order::get("{{request.order_href}}");
$bank_account = Balanced\BankAccount::get("{{request.bank_account_href}}");
$order->debitFrom(
    $bank_account,
    "{{request.payload.amount}}"
);

