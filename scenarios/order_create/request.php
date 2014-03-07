$merchant = Balanced\Customer::get("{{request.customer_href}}");
$order = $merchant->createOrder();