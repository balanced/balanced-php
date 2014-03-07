$bank_account = Balanced\BankAccount::get("{{request.bank_account_href}}");
$bank_account->debit({{request.payload.amount}});