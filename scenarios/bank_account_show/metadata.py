bank_account = json.loads(
    storage['bank_account_create']['response']
)

request = {
    'uri': bank_account['uri'],
}
