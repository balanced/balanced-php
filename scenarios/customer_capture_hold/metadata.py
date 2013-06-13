import random

customer = json.loads(
    storage['customer_add_card']['response']
)

storage.pop('customer_add_card', None)

customer_hold = json.loads(
    storage['customer_create_hold']['response']
)

request = {
    'uri': customer['debits_uri'],
    'customer_uri': customer['uri'],
    'payload': {
        'hold_uri': customer_hold['uri'],
        'amount': customer_hold['amount'],
    },
}