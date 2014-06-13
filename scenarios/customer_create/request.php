$marketplace = Balanced\Marketplace::mine();
$customer = $marketplace->customers->create(array(
{% set payload = payload_to_hash(request.payload) %}
{{ payload|raw }}
));
