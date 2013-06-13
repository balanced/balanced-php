$account = \Balanced\Account::get("{{ request.account_uri }}");
$account->debit('{{ request.payload.amount }}');