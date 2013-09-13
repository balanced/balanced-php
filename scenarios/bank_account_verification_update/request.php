$verification = Balanced\BankAccountVerification::get("{{ request.uri }}");
{% for k, v in request.payload %}
$verification->{{ k }} = {{ v }};
{% endfor %}
$verification->save();