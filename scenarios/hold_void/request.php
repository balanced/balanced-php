$hold = Balanced\Hold::get("{{ request.uri }}");
$hold->void();