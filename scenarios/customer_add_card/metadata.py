ctx.storage.pop('customer_create', None)

customer_var = json.loads(
    storage['customer_create']['response']
)

ctx.storage.pop('card_create', None)

card = json.loads(
    ctx.storage['card_create']['response']
)

request = {
    'uri': customer_var['uri'],
    'payload': {
        'card_uri': card['uri'],
    }
}
