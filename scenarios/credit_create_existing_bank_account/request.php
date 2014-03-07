$bank_account = Balanced\BankAccount::get("{{ request.uri }}");
$bank_account->credits->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));
