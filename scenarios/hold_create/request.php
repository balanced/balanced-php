$buyer = Balanced\Account::get("{{ request.account_uri }}");
$buyer->hold(
    "{{ request.payload.amount }}",
    "{{ request.payload.description }}"
);