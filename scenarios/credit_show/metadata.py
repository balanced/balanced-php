credit = json.loads(
    storage['credit_create_new_bank_account']['response']
)

request = {
    'id': credit['id'],
    'uri': credit['uri'],
}
