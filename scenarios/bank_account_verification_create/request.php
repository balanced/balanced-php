// NOTE: Bank account must be associated with a customer before initiating a verification

$bank_account = Balanced\BankAccount::get("{{ request.bank_account_uri }}");
$verification = $bank_account->verify();