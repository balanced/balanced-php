$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$customer->unstore();
