$card = Balanced\Card::get("{{request.card_href}}");
$card->credits->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));