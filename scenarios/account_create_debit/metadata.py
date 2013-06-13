account = json.loads(
    storage['account_create_buyer']['response']
)

request = {
    'uri': account['debits_uri'],
    'account_uri': account['uri'],
    'payload': {
        'amount': 1000,
    }
}
