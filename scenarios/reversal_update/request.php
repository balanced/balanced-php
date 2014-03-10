$reversal = Balanced\Reversal::get("{{request.uri}}");
$reversal->description = '{{request.payload.description}}';
$reversal->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$reversal->save();