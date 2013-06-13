import random

storage.pop('bank_account_create', None)
bank_account = json.loads(
    storage['bank_account_create']['response']
)

account = json.loads(
    storage['account_create_buyer']['response']
)

request = {
    'uri': account['uri'],
    'payload': {
        'bank_account_uri': bank_account['uri'],
    },
}