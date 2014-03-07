$customer = Balanced\Customer::get("{{request.customer_href}}");
$order = $customer->orderCreate();