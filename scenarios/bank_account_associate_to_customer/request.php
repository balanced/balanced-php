$bank_account = Balanced\BankAccount::get("{{request.uri}}");
$bank_account->associateToCustomer("{{request.payload.customer_href}}");