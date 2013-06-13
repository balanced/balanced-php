import balanced

bank_account = balanced.BankAccount(
    **{
        'type': 'checking',
        'account_number': '9900000001',
        'routing_number': '321174851',
        'name': 'Johann Bernoulli',
        }
).save()
verification = bank_account.verify()

request = {
    'uri': verification.uri,
    'bank_account_uri': bank_account.uri,
    'payload': {
        'amount_1': 1,
        'amount_2': 1,
    }
}
