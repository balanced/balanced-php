$bank_account = Balanced\BankAccount::get("{{ request.bank_account_uri }}");
$verification = $bank_account->verify();