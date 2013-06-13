$debit = Balanced\Debit::get("{{ request.uri }}");
$debit->description = "{{ request.payload.description }}";
$debit->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$debit->save();