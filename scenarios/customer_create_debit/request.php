$customer = \Balanced\Customer::get("{{ request.customer_uri }}");
$customer->debits->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));