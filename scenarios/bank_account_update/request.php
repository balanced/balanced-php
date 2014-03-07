$bank_account = Balanced\BankAccount::get("{{request.uri}}");
$bank_account->meta = array(
    {% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$bank_account->save();