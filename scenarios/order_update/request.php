$order = Balanced\Order::get("{{request.uri}}");
$order->description = '{{request.payload.description}}';
$order->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$order->save();