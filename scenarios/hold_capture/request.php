$hold = Balanced\Hold::get("{{ request.hold_uri }}");
$debit = $hold->capture();