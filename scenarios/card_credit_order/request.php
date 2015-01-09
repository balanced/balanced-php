$order = Balanced\Order::get("{{request.order_href}}");
$card = Balanced\Card::get("{{request.card_href}}");
$order->creditTo(
    $card,
    {{request.payload.amount}}
);