$customer = \Balanced\Customer::get("{{ request.customer_uri }}");
$customer->debits->create(array(
    "hold_uri" => "{{ request.payload.hold_uri }}",
    "amount" => "{{ request.payload.amount }}",
));