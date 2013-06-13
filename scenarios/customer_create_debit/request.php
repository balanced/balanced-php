$customer = \Balanced\Customer::get("{{ request.customer_uri }}");
$customer->debit('{{ request.payload.amount }}');