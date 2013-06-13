$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$credits = $customer->credits->query()->all();