$card = Balanced\Card::get("{{ request.uri }}");
$card->is_valid = false;
$card->save();