card = json.loads(
    storage['card_create']['response']
)

request = {
    'uri': card['uri'],
    'payload': {
        'meta': {
            'my-own-customer-id': '12345',
            'facebook.user_id': '0192837465',
            'twitter.id': '1234987650',
        },
    }
}
