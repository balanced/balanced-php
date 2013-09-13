$bank_account_info = array(
{% for k, v in request.payload.bank_account %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$credit = Balanced\Credit::bankAccount(
    {{ request.payload.amount }},
    $bank_account_info
);