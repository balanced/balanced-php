$card = Balanced\Card::get("{{ request.uri }}");
$card->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$card->save();