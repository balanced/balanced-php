$account = Balanced\Account::get("{{ request.href }}");
$account->settlements->create(array(
"appears_on_statement_as" => "{{request.payload.appears_on_statement_as}}",
"description" => "{{request.payload.description}}",
"funding_instrument" => "{{request.payload.funding_instrument}}",
"meta" => array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
)
{% endfor %}
));