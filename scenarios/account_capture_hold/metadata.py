import random

buyer = json.loads(
    storage['account_create_buyer']['response']
)

storage.pop('account_create_hold', None)

account_hold = json.loads(
    storage['account_create_hold']['response']
)

request = {
    'uri': buyer['debits_uri'],
    'account_uri': buyer['uri'],
    'payload': {
        'hold_uri': account_hold['uri'],
        'amount': account_hold['amount'],
    },
}
