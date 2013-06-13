$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$refunds = $customer->refunds->query()->all();