$bank_account = Balanced\BankAccount::get("{{ request.uri }}");
$credits = $bank_account->credits->query()->all();