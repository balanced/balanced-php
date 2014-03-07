$api_key = Balanced\APIKey::get("{{ request.uri }}");
$api_key->unstore();