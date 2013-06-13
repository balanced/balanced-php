callback = json.loads(
    storage['callback_create']['response']
)

request = {
    'uri': callback['uri'],
}
