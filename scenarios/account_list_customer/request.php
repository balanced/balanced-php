$customer = Balanced\Customer::get("{{request.customer_href}}");
$accounts = $customer->accounts->query()->all();
