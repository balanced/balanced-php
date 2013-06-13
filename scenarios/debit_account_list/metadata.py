account = json.loads(
    storage['account_create_buyer']['response']
)

request = {
    'uri': account['uri'],
    'debits_uri': account['debits_uri'],
}
