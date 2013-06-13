$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$holds = $customer->holds->query()->all();