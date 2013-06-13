refund = json.loads(
    storage['refund_create']['response']
)
request = {
    'uri': refund['uri'],
    'payload': {
        'description': 'update this description',
        'meta': {
            'refund.reason': 'user not happy with product',
            'user.refund.count': '3',
            'user.notes': 'very polite on the phone',
        }
    }
}
