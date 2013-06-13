customer = json.loads(
    storage['customer_add_bank_account']['response']
)


request = {
    'customer_uri': customer['uri'],
    'uri': customer['credits_uri'],
    'payload': {
        'amount': 100,
    },
}