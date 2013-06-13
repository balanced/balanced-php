$debit = Balanced\Debit::get("{{ request.debit_uri }}");
$debit->refund(
    null,
    "{{ request.payload.description }}",
    array(
    {% for k, v in payload.meta %}
        "{{ k }}" => "{{ v }}",
    {% endfor %}
    )
);