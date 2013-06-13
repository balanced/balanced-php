hold = json.loads(
    storage['hold_create']['response']
)

request = {
    'uri': hold['uri']
}
