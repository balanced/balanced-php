$credit = Balanced\Credit::get("{{request.uri}}");
$credit->description = '{{request.payload.description}}';
$credit->save();