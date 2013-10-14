$customer = new \Balanced\Customer(array(
  "name" => "{{ request.name }}",
  "email" => "{{ request.email }}",
));
$customer->save();