$customer = \Balanced\Customer::get("{{ request.uri }}");
$customer->addBankAccount("{{ request.payload.bank_account_uri }}");