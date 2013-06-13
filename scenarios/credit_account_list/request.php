$merchant = Balanced\Account::get("{{ request.account_uri }}");
$credits = $merchant->credits->query()->all();