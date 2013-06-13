$account = \Balanced\Account::get("{{ request.uri }}");
$account->addBankAccount("{{ request.payload.bank_account_uri }}");