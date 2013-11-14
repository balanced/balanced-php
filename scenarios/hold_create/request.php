$marketplace = \Balanced\Marketplace::mine();
$hold = $marketplace->holds->create(array(
  "amount" => {{ request.payload.amount }},
  "description" => "{{ request.payload.description }}",
  "source_uri" => "{{ request.payload.source_uri }}"
));