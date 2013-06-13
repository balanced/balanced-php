$debit = Balanced\Debit::get("{{ request.debit_uri }}");
$debit->refund();