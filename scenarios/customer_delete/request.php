$customer = Balanced\Customer::get("{{ request.uri }}");
$customer->unstore();
