$marketplace = Balanced\Marketplace::mine();
$customer = $marketplace->customers->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));