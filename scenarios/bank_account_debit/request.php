$bank_account = Balanced\BankAccount::get("{{request.bank_account_href}}");
$bank_account->debits->create(array(
{% for k, v in request.payload %}
{% if k == "amount" %}
    "{{ k }}" => {{ v }},
{% else %}
    "{{ k }}" => "{{ v }}",
{% endif %}
{% endfor %}
));
