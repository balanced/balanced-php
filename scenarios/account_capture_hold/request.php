$account = \Balanced\Account::get("{{ request.account_uri }}");
$account->debits->create(array(
    "hold_uri" => "{{ request.payload.hold_uri }}",
    "amount" => "{{ request.payload.amount }}",
));