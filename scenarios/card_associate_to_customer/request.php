$card = Balanced\Card::get("{{request.uri}}");
$card->associateToCustomer("{{request.payload.customer}}");