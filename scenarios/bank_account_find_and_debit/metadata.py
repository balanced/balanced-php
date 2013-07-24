bank_account = json.loads(
    storage['bank_account_create']['response']
)

request = {
    'id': bank_account['id'],
    'uri': bank_account['uri'],
    'debits_uri': storage['api_location'] + bank_account['debits_uri'],
    'amount': 1000,
}
