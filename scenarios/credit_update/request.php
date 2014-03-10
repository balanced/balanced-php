$credit = Balanced\Credit::get("{{request.uri}}");
$credit->description = '{{request.payload.description}}';
$credit->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$credit->save();