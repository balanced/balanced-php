$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$customer->debit(
    "{{ request.payload.amount }}",
    "{{ request.payload.appears_on_statement_as }}",
    null,
    "{{ request.payload.description }}"
);