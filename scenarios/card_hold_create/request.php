$card = Balanced\Card::get("{{request.card_href}}");
$card->card_holds->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));