$refund = Balanced\Refund::get("{{ request.uri }}");
$refund->description = "{{ request.payload.description }}";
$refund->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$refund->save();