$bank_account = new Balanced\BankAccount(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));
try {
    $bank_account->save();
}
catch(Balanced\Errors\InvalidRoutingNumber $e) {
  // handle error here
}