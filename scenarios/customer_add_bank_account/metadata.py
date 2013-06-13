ctx.storage.pop('customer_create', None)

bank_account_var = json.loads(
    storage['customer_create']['response']
)

ctx.storage.pop('bank_account_create', None)

bank_account = json.loads(
    ctx.storage['bank_account_create']['response']
)

request = {
    'uri': bank_account_var['uri'],
    'payload': {
        'bank_account_uri': bank_account['uri'],
    }
}
