$bank_account_info = array(
{% for k, v in request.bank_account %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$credit = Balanced\Credit::bankAccount(
    {{ request.amount }},
    $bank_account_info
);