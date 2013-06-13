$customer = \Balanced\Customer::get("{{ request.customer_uri }}");
$customer->hold('{{ request.payload.amount }}');