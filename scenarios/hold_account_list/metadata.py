account = json.loads(
    storage['account_create_buyer']['response']
)

request = {
    'uri': account['holds_uri'],
    'account_uri': account['uri'],
}
