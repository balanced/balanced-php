$buyer = Balanced\Marketplace::mine()->createBuyer(
    null,
    "{{ request.payload.card_uri }}"
);