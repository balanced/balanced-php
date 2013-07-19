card = json.loads(
    storage['card_create']['response']
)

request = {
    'uri': card['uri'],
}
