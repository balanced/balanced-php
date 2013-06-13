
storage.pop('debit_create', None)

debit = json.loads(
    storage['debit_create']['response']
)

request = {
    'payload': {
        'debit_uri': debit['uri'],
        'description': 'Refund for Order #1111',
        'meta': {
            'user.refund_reason': 'not happy with product',
            'merchant.feedback': 'positive',
            'fulfillment.item.condition': 'OK'
        },
    },
    'uri': debit['account']['refunds_uri'],
    'debit_uri': debit['uri'],
}