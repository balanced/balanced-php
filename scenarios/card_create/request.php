$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "{{ request.payload.card_number }}",
    "{{ request.payload.security_code }}",
    "{{ request.payload.expiration_month }}",
    "{{ request.payload.expiration_year }}"
);