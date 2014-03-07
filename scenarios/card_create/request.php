$card = Balanced\Marketplace::mine()->cards->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));