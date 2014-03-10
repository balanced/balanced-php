$debit = Balanced\Debit::get("{{ request.debit_href }}");

$debit->refunds->create(array(
    'description' => '{{ request.payload.description }}',
    'meta' => array(
    {% for k, v in request.payload.meta %}
        "{{ k }}" => "{{ v }}",
    {% endfor %}
    )
));
