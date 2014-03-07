$customer = Balanced\Customer::get("{{request.uri}}");
$cusotmer->email = '{{request.payload.email}}';
$customer->meta = array(
{% for k, v in request.payload.meta %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
);
$customer->save();