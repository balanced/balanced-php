$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$customer->credit({{ request.payload.amount }});