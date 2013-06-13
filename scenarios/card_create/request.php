$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "{{ requeest.payload.card_number }}",
    "{{ requeest.payload.security_code }}",
    "{{ requeest.payload.expiration_month }}",
    "{{ requeest.payload.expiration_year }}"
);