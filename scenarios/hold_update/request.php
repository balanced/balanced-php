$hold = Balanced\Hold::get("{{ request.uri }}");
$hold->description = "{{ request.payload.description }}";
$hold->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$hold->save();