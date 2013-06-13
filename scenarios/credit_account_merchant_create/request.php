$merchant = Balanced\Account::get("{{ request.account_uri }}");
$merchant->credit({{ request.payload.amount }});