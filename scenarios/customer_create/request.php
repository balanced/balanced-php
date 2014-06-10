$marketplace = Balanced\Marketplace::mine();
$customer = $marketplace->customers->create(array(
{% for k, v in request.payload %}
{% if v is iterable%}
"{{ k }}" => array(
{% for b, a in v %}
    "{{ b }}" => "{{ a }}",
{% endfor %}
),
{% else %}
"{{ k }}" => "{{ v }}",
{% endif %}
{% endfor %}
));
