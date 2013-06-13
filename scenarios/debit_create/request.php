$buyer = Balanced\Account::get("{{ request.account_uri }}");
$buyer->debit(
    "{{ request.payload.amount }}",
    "{{ request.payload.appears_on_statement_as }}",
    "{{ request.payload.description }}"
);