customer = json.loads(
    storage['customer_add_card']['response']
)

request = {
    'uri': customer['debits_uri'],
    'customer_uri': customer['uri'],
    'payload': {
        'amount': 1000,
    }
}