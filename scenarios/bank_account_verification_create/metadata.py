import balanced


balanced.configure(storage['api_key'])

bank_account = balanced.BankAccount(
    **{
    'type': 'checking',
    'account_number': '9900000001',
    'routing_number': '321174851',
    'name': 'Johann Bernoulli',
    }
).save()

request = {
    'uri': bank_account.verifications_uri,
    'bank_account_uri': bank_account.uri,
    'payload': { 'none': '' }
}
