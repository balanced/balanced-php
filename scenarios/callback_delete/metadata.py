callbacks = json.loads(
    storage['callback_list']['response']
)

callback = callbacks['items'][-1]

request = {
    'uri': callback['uri'],
}
