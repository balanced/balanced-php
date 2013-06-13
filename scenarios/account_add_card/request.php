$account = \Balanced\Account::get("{{ request.uri }}");
$account->addCard("{{ request.payload.card_uri }}");