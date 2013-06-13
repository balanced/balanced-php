$buyer = Balanced\Account::get("{{ request.account_uri }}");
$refunds = $buyer->refunds->query()->all();