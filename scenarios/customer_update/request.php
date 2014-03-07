$customer = Balanced\Customer::get("{{request.uri}}");
$cusotmer->email = '{{request.payload.email}}';
$customer->save();