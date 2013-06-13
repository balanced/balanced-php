$customer = Balanced\Customer::get("{{ request.uri }}");
$debits = $customer->debits->query()->all();