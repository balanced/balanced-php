$bank_account = new \Balanced\BankAccount(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));

$bank_account->save();