$bank_account = Balanced\BankAccount::get("{{ request.uri }}");
$credit = $bank_account->credit({{ request.payload.amount }});