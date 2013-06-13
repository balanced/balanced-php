$debit = Balanced\Debit::get("{{ request.debit_uri }}");
$debit->refund(
    null,
    "{{ request.payload.description }}",
    array(
    {% for k, v in request.payload.meta %}
        "{{ k }}" => "{{ v }}",
    {% endfor %}
    )
);