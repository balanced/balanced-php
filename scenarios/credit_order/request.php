$order = Balanced\Order::get("{{request.order_href}}");
$bank_account = Balanced\BankAccount::get("{{request.bank_account_href}}");
$order->creditTo(
    $bank_account,
    {{request.payload.amount}}
);
