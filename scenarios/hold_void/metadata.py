storage.pop('hold_create', None)

hold = json.loads(
    storage['hold_create']['response']
)
request = {
    'uri': hold['uri'],
    'payload': {
        'is_void': 'true',
    }
}
