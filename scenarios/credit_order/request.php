$order = Balanced\Order::get("{{request.order_href}}");
$bank_account = Balanced\$bank_account::get("{{request.bank_account_href}}");
$order->creditTo(
    $bank_account,
    "{{request.payload.amount}}"
);
