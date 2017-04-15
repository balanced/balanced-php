$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "{{ request.payload.card_number }}",
    "{{ request.payload.security_code }}",
    "{{ request.payload.expiration_month }}",
    "{{ request.payload.expiration_year }}"
);
$customer = new Balanced\Customer();
$customer->save();
$customer->addCard($card->uri);
$card = Balanced\Card::get($card->uri);
$debit = $card->debit(10000);