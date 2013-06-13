$bank_account = Balanced\BankAccount::get("{{ request.uri }}");
$bank_account->delete();