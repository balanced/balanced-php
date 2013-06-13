ctx.storage.pop('account_create_buyer', None)

account_var = json.loads(
    storage['account_create_buyer']['response']
)

ctx.storage.pop('card_create', None)

card = json.loads(
    ctx.storage['card_create']['response']
)

request = {
    'uri': account_var['uri'],
    'payload': {
        'card_uri': card['uri'],
    }
}
