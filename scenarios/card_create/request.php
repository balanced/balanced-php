$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "{{ request.payload.number }}",
    "{{ request.payload.cvv }}",
    "{{ request.payload.expiration_month }}",
    "{{ request.payload.expiration_year }}"
);