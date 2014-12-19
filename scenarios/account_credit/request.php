$payable_account = Balanced\Account::get("{{ request.href }}");
$payable_account->credits->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));