customer = json.loads(
    storage['customer_add_card']['response']
)

request = {
    'uri': customer['holds_uri'],
    'customer_uri': customer['uri'],
}