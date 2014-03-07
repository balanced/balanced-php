$bank_account = Balanced\BankAccount::get("{{request.uri}}");
$bank_account->meta->my_customer_id = '123123123';
$bank_account->save();