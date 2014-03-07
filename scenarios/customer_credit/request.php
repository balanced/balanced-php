$customer = Balanced\Customer::get("{{ request.customer_uri }}");
$cusotmer->credits->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));