$payable_account = Balanced\Account::get("{{ request.href }}");
$payable_account->credits->create(array(
"amount" => "{{request.payload.amount}}",
"appears_on_statement_as" => "{{request.payload.appears_on_statement_as}}",
"description" => "{{request.payload.description}}",
"order" => "{{request.payload.order}}",
"meta" => array(
{% for k, v in request.payload.meta %}
"{{ k }}" => "{{ v }}",
)
{% endfor %}
));
