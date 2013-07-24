$bank_account = Balanced\BankAccount::get("{{ request.uri }}");
$bank_account->debit({{ request.amount }});
