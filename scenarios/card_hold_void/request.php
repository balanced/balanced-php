$hold = Balanced\CardHold::get("{{request.uri}}");
$hold->void();