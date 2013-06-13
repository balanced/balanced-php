debit = json.loads(
    storage['debit_create']['response']
)

request = {
    'payload': {
        'description': 'New description for debit',
        'meta': {
          'facebook.id': '1234567890',
          'anykey': 'valuegoeshere',
        },
    },
    'uri': debit['uri'],
}