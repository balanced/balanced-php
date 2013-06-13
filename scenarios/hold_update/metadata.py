hold = json.loads(
    storage['hold_create']['response']
)
request = {
    'uri': hold['uri'],
    'payload': {
        'description': 'update this description',
        'meta': {
            'holding.for': 'user1',
            'meaningful.key': 'some.value',
        }
    }
}
