$customer = \Balanced\Customer::get("{{ request.uri }}");
$customer->addCard("{{ request.payload.card_uri }}");