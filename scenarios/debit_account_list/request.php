$account = Balanced\Account::get("{{ request.uri }}");
$debits = $account->debits->query()->all();