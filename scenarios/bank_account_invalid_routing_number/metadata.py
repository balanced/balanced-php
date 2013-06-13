import random

request = {
    'uri': marketplace.bank_accounts_uri,
    'payload': {
        'type': 'checking',
        'account_number': '9900000001',
        'routing_number': random.choice(['111111118', '100000007']),
        'name': 'Johann Bernoulli',
    }
}