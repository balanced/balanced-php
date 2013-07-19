$card = Balanced\Card::get("{{ request.uri }}");
$card->unstore();
